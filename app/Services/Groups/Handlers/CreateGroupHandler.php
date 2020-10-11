<?php

namespace App\Services\Groups\Handlers;

use App\Models\Music\Group;
use App\Services\Groups\Repositories\GroupRepositoryInterface;
use Illuminate\Support\Facades\Request;

/**
 * Class CreateGroupHandler
 * @package App\Services\Groups\Handlers
 */
class CreateGroupHandler
{
    /**
     * @var GroupRepositoryInterface
     */
    private $groupRepository;

    /**
     * CreateGroupHandler constructor.
     * @param GroupRepositoryInterface $groupRepository
     */
    public function __construct(
        GroupRepositoryInterface $groupRepository
    )
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * @param array $data
     * @return Group
     */
    public function handle(array $data): Group
    {
        $data['cover'] = $this->saveFile();
        return $this->groupRepository->createFromArray($data);
    }

    /**
     * @return string|null
     */
    public function saveFile()
    {
        if (Request::hasFile('cover')) {
            $file = Request::file('cover')->store('/group', 'public');
            return '/storage/' . $file;
        } else {
            return null;
        }
    }
}
