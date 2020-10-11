<?php

namespace App\Services\Groups\Repositories;

use App\Models\Music\Group;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface GroupRepositoryInterface
 * @package App\Services\Groups\Repositories
 */
interface GroupRepositoryInterface
{
    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function search(int $perPage): LengthAwarePaginator;

    /**
     * @param array $data
     * @return Group
     */
    public function createFromArray(array $data): Group;

    /**
     * @param Group $group
     * @param array $data
     * @return Group
     */
    public function updateFromArray(Group $group, array $data): Group;

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id);
}
