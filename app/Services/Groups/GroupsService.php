<?php


namespace App\Services\Groups;


use App\Models\Music\Group;
use App\Services\Groups\Handlers\CreateGroupHandler;
use App\Services\Groups\Handlers\UpdateGroupHandler;
use App\Services\Groups\Repositories\GroupRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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

    public function findGroup(int $id)
    {
        return $this->groupRepository->find($id);
    }

    public function searchGroups($perPage)
    {
        return $this->groupRepository->search($perPage);
    }

    public function storeGroup(array $data)
    {
        return $this->createGroupHandler->handle($data);
    }

    public function updateGroup(Group $group, array $data)
    {
        return $this->updateGroupHandler->handle($group, $data);
    }

    public function destroyGroup($id)
    {
        return $this->groupRepository->destroy($id);
    }
}