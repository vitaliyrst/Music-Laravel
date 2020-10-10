<?php

namespace App\Services\Groups\Handlers;

use App\Models\Music\Group;
use App\Services\Groups\Repositories\GroupRepositoryInterface;
use Illuminate\Support\Facades\Request;

class UpdateGroupHandler
{
    private $groupRepository;

    public function __construct(
        GroupRepositoryInterface $groupRepository
    )
    {
        $this->groupRepository = $groupRepository;
    }

    public function handle(Group $group, array $data)
    {
        if (!Request::file('cover')) {
            $data['cover'] = $group->cover;
        } else {
            $data['cover'] = $this->updateFile();
        }
        return $this->groupRepository->updateFromArray($group, $data);
    }

    public function updateFile()
    {
        if (Request::hasFile('cover')) {
            $file = Request::file('cover')
                ->store('/group', 'public');
            return '/storage/' . $file;
        }
        return null;
    }
}
