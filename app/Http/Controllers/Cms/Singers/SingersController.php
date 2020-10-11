<?php

namespace App\Http\Controllers\Cms\Singers;

use App\Http\Controllers\Cms\BaseController;
use App\Http\Requests\Singer\StoreSingerRequest;
use App\Http\Requests\Singer\UpdateSingerRequest;
use App\Models\Music\Singer;
use App\Services\Singers\SingersService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SingersController extends BaseController
{
    /**
     * @var SingersService
     */
    private $singersService;

    public function __construct(SingersService $singersService)
    {
        $this->singersService = $singersService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $groups = $this->singersService->searchAllGroups();
        return view('music_test.cms.singer.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Singer $singer
     * @return Application|Factory|Response|View
     */
    public function create(Singer $singer)
    {
        $groups = $this->singersService->searchAllGroups();
        return view('music_test.cms.singer.add', ['singer' => $singer, 'groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSingerRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSingerRequest $request)
    {
        $data = $request->getFormData();
        $store = $this->singersService->storeSinger($data);
        if (isset($store)) {
            return redirect()->route('cms.music.singers.create')
                ->with(['success' => Auth::user()->name . ', исполнитель добавлен!']);
        } else {
            return redirect()->route('cms.music.singers.create')
                ->withErrors(['msg' => Auth::user()->name . ', ошибка при добавлении!'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Singer $singer
     * @return void
     */
    public function show(Singer $singer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Singer $singer
     * @return Application|Factory|Response|View
     */
    public function edit(Singer $singer)
    {
        $groups = $this->singersService->searchAllGroups();
        return view('music_test.cms.singer.edit', ['singer' => $singer, 'groups' => $groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSingerRequest $request
     * @param Singer $singer
     * @return RedirectResponse
     */
    public function update(UpdateSingerRequest $request, Singer $singer)
    {
        $data = $request->getFormData();
        $update = $this->singersService->updateSinger($singer, $data);
        if (isset($update)) {
            return redirect()->route('cms.music.singers.edit', $singer->id)
                ->with(['success' => Auth::user()->name . ', исполнитель обновлен!']);
        } else {
            return redirect()->route('cms.music.singers.edit')
                ->withErrors(['msg' => Auth::user()->name . ', ошибка при обновлении!'])
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
        $destroy = $this->singersService->destroySinger($id);
        if ($destroy == 1) {
            return redirect()->route('cms.music.singers.index')
                ->with(['success' => Auth::user()->name . ', исполнитель удален!']);
        } else {
            return back()
                ->withErrors(['msg' => Auth::user()->name . ', ошибка при удалении!'])
                ->withInput();
        }
    }
}
