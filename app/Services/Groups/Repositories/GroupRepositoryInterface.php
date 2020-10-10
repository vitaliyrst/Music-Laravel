<?php

namespace App\Services\Groups\Repositories;

use App\Models\Music\Album;
use App\Models\Music\Group;

interface GroupRepositoryInterface
{
    public function find(int $id);

    public function search(int $perPage);

    public function createFromArray(array $data): Group;

    public function updateFromArray(Group $group, array $data);

    public function destroy(int $id);
}
