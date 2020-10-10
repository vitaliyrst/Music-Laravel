<?php

namespace App\Services\Songs\Repositories;

use App\Models\Music\Song;
use Illuminate\Support\Collection;

interface SongRepositoryInterface
{
    public function find(int $id);

    public function getGroupsWithAlbums(): Collection;

    public function getGroups(): Collection;

    public function getAlbums(): Collection;

    public function createFromArray(array $data): Song;

    public function updateFromArray(Song $song, array $data);

    public function destroy(int $id);
}
