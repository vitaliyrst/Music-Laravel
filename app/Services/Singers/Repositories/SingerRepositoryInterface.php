<?php

namespace App\Services\Singers\Repositories;

use App\Models\Music\Singer;
use Illuminate\Support\Collection;

/**
 * Interface SingerRepositoryInterface
 * @package App\Services\Singers\Repositories
 */
interface SingerRepositoryInterface
{
    /**
     * @param array $data
     * @return Singer
     */
    public function createFromArray(array $data): Singer;

    /**
     * @param Singer $singer
     * @param array $data
     * @return Singer
     */
    public function updateFromArray(Singer $singer, array $data): Singer;

    /**
     * @return Collection
     */
    public function getGroups(): Collection;

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id);
}
