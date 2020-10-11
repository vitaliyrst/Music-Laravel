<?php

namespace App\Services\Groups\Handlers;

use App\Models\Music\Group;
use App\Services\Groups\Repositories\GroupRepositoryInterface;
use Illuminate\Support\Facades\Request;

/**
 * Class UpdateGroupHandler
 * @package App\Services\Groups\Handlers
 */
class UpdateGroupHandler
{
    /**
     * @var GroupRepositoryInterface
     */
    private $groupRepository;

    /**
     * UpdateGroupHandler constructor.
     * @param GroupRepositoryInterface $groupRepository
     */
    public function __construct(
        GroupRepositoryInterface $groupRepository
    )
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * @param Group $group
     * @param array $data
     * @return Group
     */
    public function handle(Group $group, array $data): Group
    {
        if (!Request::file('cover')) {
            $data['cover'] = $group->cover;
        } else {
            $data['cover'] = $this->updateFile();
        }
        return $this->groupRepository->updateFromArray($group, $data);
    }

    /**
     * @return string|null
     */
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
