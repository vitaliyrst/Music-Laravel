<?php

namespace App\Services\Albums\Repositories;

use App\Models\Music\Album;
use App\Models\Music\Group;
use Illuminate\Support\Collection;


class AlbumRepository implements AlbumRepositoryInterface
{

    public function find(int $id)
    {
        return Album::find($id);
    }

    public function createFromArray(array $data): Album
    {
        $album = new Album();
        $album->create($data);
        return $album;
    }

    public function updateFromArray(Album $album, array $data)
    {
        $album->update($data);
        return $album;
    }

    public function getGroups(): Collection
    {
        return Group::orderBy('id')->get();
    }

    public function destroy(int $id)
    {
        return Album::destroy($id);
    }
}
