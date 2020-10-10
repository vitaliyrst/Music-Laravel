<?php

namespace App\Services\Groups\Handlers;

use App\Models\Music\Group;
use App\Services\Groups\Repositories\GroupRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class CreateGroupHandler
{
    /**
     * @var GroupRepositoryInterface
     */
    private $groupRepository;

    public function __construct(
        GroupRepositoryInterface $groupRepository
    )
    {
        $this->groupRepository = $groupRepository;
    }

    public function handle(array $data): Group
    {
        $data['cover'] = $this->saveFile();
        return $this->groupRepository->createFromArray($data);
    }

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