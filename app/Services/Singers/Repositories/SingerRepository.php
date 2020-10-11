<?php

namespace App\Services\Singers\Repositories;

use App\Models\Music\Group;
use App\Models\Music\Singer;
use Illuminate\Support\Collection;

/**
 * Class SingerRepository
 * @package App\Services\Singers\Repositories
 */
class SingerRepository implements SingerRepositoryInterface
{
    /**
     * @param array $data
     * @return Singer
     */
    public function createFromArray(array $data): Singer
    {
        $singer = new Singer();
        $singer->create($data);
        return $singer;
    }

    /**
     * @param Singer $singer
     * @param array $data
     * @return Singer
     */
    public function updateFromArray(Singer $singer, array $data): Singer
    {
        $singer->update($data);
        return $singer;
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
        return Singer::destroy($id);
    }
}
