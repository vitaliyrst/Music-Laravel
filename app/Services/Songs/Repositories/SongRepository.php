<?php

namespace App\Services\Songs\Repositories;

use App\Models\Music\Album;
use App\Models\Music\Group;
use App\Models\Music\Song;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * Class SongRepository
 * @package App\Services\Songs\Repositories
 */
class SongRepository implements SongRepositoryInterface
{
    /**
     * @param int $id
     */
    public function find(int $id)
    {
        Song::find($id);
    }

    /**
     * @param array $data
     * @return Song
     */
    public function createFromArray(array $data): Song
    {
        $song = new Song();
        $song->create($data);
        return $song;
    }

    /**
     * @param Song $song
     * @param array $data
     * @return Song
     */
    public function updateFromArray(Song $song, array $data): Song
    {
        $song->update($data);
        return $song;
    }

    /**
     * @return Collection
     */
    public function getGroupsWithAlbums(): Collection
    {
        return Cache::remember('groupsWithAlbums', 300, function () {
            return Group::orderBy('id')->with('album')->orderBy('id')->get();
        });

    }

    /**
     * @return Collection
     */
    public function getAlbums(): Collection
    {
        return Album::orderBy('id')->get();
    }

    /**
     * @param int $id
     * @return int|mixed
     */
    public function destroy(int $id)
    {
        return Song::destroy($id);
    }

    /**
     * @return Collection
     */
    public function getGroups(): Collection
    {
        return Group::orderBy('id')->get();
    }
}
