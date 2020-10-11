<?php

namespace App\Services\Albums\Repositories;

use App\Models\Music\Album;
use App\Models\Music\Group;
use Illuminate\Support\Collection;

/**
 * Class AlbumRepository
 * @package App\Services\Albums\Repositories
 */
class AlbumRepository implements AlbumRepositoryInterface
{
    /**
     * @param array $data
     * @return Album
     */
    public function createFromArray(array $data): Album
    {
        $album = new Album();
        $album->create($data);
        return $album;
    }

    /**
     * @param Album $album
     * @param array $data
     * @return Album
     */
    public function updateFromArray(Album $album, array $data): Album
    {
        $album->update($data);
        return $album;
    }

    /**
     * @return Collection
     */
    public function getGroups(): Collection
    {
        return Group::orderBy('id')->get();
    }

    /**
     * @param int $id
     * @return int|mixed
     */
    public function destroy(int $id)
    {
        return Album::destroy($id);
    }
}
