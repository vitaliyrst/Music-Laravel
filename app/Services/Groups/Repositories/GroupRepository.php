<?php

namespace App\Services\Groups\Repositories;

use App\Models\Music\Group;

class GroupRepository implements GroupRepositoryInterface
{
    public function find(int $id)
    {
        return Group::find($id);
    }

    public function search(int $perPage)
    {
        return Group::paginate($perPage);
    }

    public function createFromArray(array $data): Group
    {
        $group = new Group();
        $group->create($data);
        return $group;
    }

    public function updateFromArray(Group $group, array $data)
    {
        $group->update($data);
        return $group;
    }

    public function destroy($id)
    {
        return Group::destroy($id);
    }
}
