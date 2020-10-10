<?php

namespace App\Services\Albums\Repositories;

use App\Models\Music\Album;
use Illuminate\Support\Collection;

interface AlbumRepositoryInterface
{
    public function find(int $id);

    public function getGroups(): Collection;

    public function createFromArray(array $data): Album;

    public function updateFromArray(Album $album, array $data);

    public function destroy(int $id);
}
