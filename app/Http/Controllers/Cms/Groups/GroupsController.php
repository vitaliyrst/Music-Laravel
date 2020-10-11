<?php

namespace App\Http\Controllers\Cms\Groups;

use App\Http\Controllers\Cms\BaseController;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Models\Music\Group;
use App\Services\Groups\GroupsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GroupsController extends BaseController
{
    /**
     * @var GroupsService
     */
    private $groupsService;

    public function __construct(GroupsService $groupsService)
    {
        $this->groupsService = $groupsService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $group = $this->groupsService->searchGroups(10);
        return view('music_test.cms.group.index', ['groups' => $group]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('music_test.cms.group.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGroupRequest $request
     * @return RedirectResponse
     */
    public function store(StoreGroupRequest $request)
    {
        $data = $request->getFormData();
        $store = $this->groupsService->storeGroup($data);

        if (isset($store)) {
            return redirect()->route('cms.music.groups.create')
                ->with(['success' => Auth::user()->name . ', группа добавлена!']);
        } else {
            return back()
                ->withErrors(['msg' => Auth::user()->name . ', ошибка при добавлении!'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Group $group
     * @return void
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Group $group
     * @return Application|Factory|Response|View
     */
    public function edit(Group $group)
    {
        return view('music_test.cms.group.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGroupRequest $request
     * @param Group $group
     * @return RedirectResponse
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $data = $request->getFormData();
        $update = $this->groupsService->updateGroup($group, $data);
        if (isset($update)) {
            return redirect()->route('cms.music.groups.edit', $group->id)
                ->with(['success' => Auth::user()->name . ', группа обновлена!']);
        } else {
            return back()
                ->withErrors(['msg' => Auth::user()->name . ', ошибка при сохранении!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $destroy = $this->groupsService->destroyGroup($id);
        if ($destroy == 1) {
            return redirect()->route('cms.music.groups.index')
                ->with(['success' => Auth::user()->name . ', группа удалена!']);
        } else {
            return back()
                ->withErrors(['msg' => Auth::user()->name . ', ошибка при удалении!'])
                ->withInput();
        }
    }
}
