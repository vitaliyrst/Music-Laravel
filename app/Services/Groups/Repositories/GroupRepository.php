<?php

namespace App\Services\Groups\Repositories;

use App\Models\Music\Group;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class GroupRepository
 * @package App\Services\Groups\Repositories
 */
class GroupRepository implements GroupRepositoryInterface
{
    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function search(int $perPage): LengthAwarePaginator
    {
           return Group::paginate($perPage);
    }

    /**
     * @param array $data
     * @return Group
     */
    public function createFromArray(array $data): Group
    {
        $group = new Group();
        $group->create($data);
        return $group;
    }

    /**
     * @param Group $group
     * @param array $data
     * @return Group
     */
    public function updateFromArray(Group $group, array $data): Group
    {
        $group->update($data);
        return $group;
    }

    /**
     * @param int $id
     * @return int|mixed
     */
    public function destroy(int $id)
    {
        return Group::destroy($id);
    }
}
