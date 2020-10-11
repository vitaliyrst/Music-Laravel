<?php

namespace App\Services\Groups;

use App\Models\Music\Group;
use App\Services\Groups\Handlers\CreateGroupHandler;
use App\Services\Groups\Handlers\UpdateGroupHandler;
use App\Services\Groups\Repositories\GroupRepositoryInterface;

/**
 * Class GroupsService
 * @package App\Services\Groups
 */
class GroupsService
{
    /**
     * @var GroupRepositoryInterface
     */
    private $groupRepository;
    /**
     * @var CreateGroupHandler
     */
    private $createGroupHandler;
    /**
     * @var UpdateGroupHandler
     */
    private $updateGroupHandler;

    /**
     * GroupsService constructor.
     * @param GroupRepositoryInterface $groupRepository
     * @param CreateGroupHandler $createGroupHandler
     * @param UpdateGroupHandler $updateGroupHandler
     */
    public function __construct(
        GroupRepositoryInterface $groupRepository,
        CreateGroupHandler $createGroupHandler,
        UpdateGroupHandler $updateGroupHandler
    )
    {
        $this->groupRepository = $groupRepository;
        $this->createGroupHandler = $createGroupHandler;
        $this->updateGroupHandler = $updateGroupHandler;
    }

    /**
     * @param $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function searchGroups($perPage)
    {
        return $this->groupRepository->search($perPage);
    }

    /**
     * @param array $data
     * @return Group
     */
    public function storeGroup(array $data)
    {
        return $this->createGroupHandler->handle($data);
    }

    /**
     * @param Group $group
     * @param array $data
     * @return Group
     */
    public function updateGroup(Group $group, array $data)
    {
        return $this->updateGroupHandler->handle($group, $data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroyGroup($id)
    {
        return $this->groupRepository->destroy($id);
    }
}
