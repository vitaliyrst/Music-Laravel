<?php

namespace App\Services\Songs\Repositories;

use App\Models\Music\Song;
use Illuminate\Support\Collection;

/**
 * Interface SongRepositoryInterface
 * @package App\Services\Songs\Repositories
 */
interface SongRepositoryInterface
{

    /**
     * @return Collection
     */
    public function getGroupsWithAlbums(): Collection;

    /**
     * @return Collection
     */
    public function getGroups(): Collection;

    /**
     * @return Collection
     */
    public function getAlbums(): Collection;

    /**
     * @param array $data
     * @return Song
     */
    public function createFromArray(array $data): Song;

    /**
     * @param Song $song
     * @param array $data
     * @return Song
     */
    public function updateFromArray(Song $song, array $data): Song;

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id);
}
