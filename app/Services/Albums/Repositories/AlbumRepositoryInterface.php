<?php

namespace App\Services\Albums\Repositories;

use App\Models\Music\Album;
use Illuminate\Support\Collection;

/**
 * Interface AlbumRepositoryInterface
 * @package App\Services\Albums\Repositories
 */
interface AlbumRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getGroups(): Collection;

    /**
     * @param array $data
     * @return Album
     */
    public function createFromArray(array $data): Album;

    /**
     * @param Album $album
     * @param array $data
     * @return Album
     */
    public function updateFromArray(Album $album, array $data): Album;

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id);
}
