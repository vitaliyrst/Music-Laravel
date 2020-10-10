<?php

namespace App\Services\Songs\Repositories;

use App\Models\Music\Album;
use App\Models\Music\Group;
use App\Models\Music\Song;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class SongRepository implements SongRepositoryInterface
{
    public function find(int $id)
    {
        Song::find($id);
    }

    public function createFromArray(array $data): Song
    {
        $song = new Song();
        $song->create($data);
        return $song;
    }

    public function updateFromArray(Song $song, array $data)
    {
        $song->update($data);
        return $song;
    }

    public function getGroupsWithAlbums(): Collection
    {
        return Cache::remember('groupsWithAlbums', 300, function () {
            return Group::orderBy('id')->with('album')->orderBy('id')->get();
        });

    }

    public function getAlbums(): Collection
    {
        return Album::orderBy('id')->get();
    }

    public function destroy(int $id)
    {
        return Song::destroy($id);
    }

    public function getGroups(): Collection
    {
        return Group::orderBy('id')->get();
    }
}
