<?php

namespace App\Http\Controllers\Cms\Albums;

use App\Http\Controllers\Cms\BaseController;
use App\Http\Requests\Album\StoreAlbumRequest;
use App\Http\Requests\Album\UpdateAlbumRequest;
use App\Models\Music\Album;
use App\Services\Albums\AlbumsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AlbumsController extends BaseController
{
    /**
     * @var AlbumsService
     */
    private $albumsService;

    public function __construct(AlbumsService $albumsService)
    {
        $this->albumsService = $albumsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $groups = $this->albumsService->searchAllGroups();
        return view('music_test.cms.album.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Album $album
     * @return Application|Factory|Response|View
     */
    public function create(Album $album)
    {
        $groups = $this->albumsService->searchAllGroups();

        return view('music_test.cms.album.add', ['album' => $album, 'groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAlbumRequest $request
     * @return RedirectResponse
     */
    public function store(StoreAlbumRequest $request)
    {
        $data = $request->getFormData();
        $store = $this->albumsService->storeAlbum($data);
        if ($store) {
            return redirect()->route('cms.music.albums.create')
                ->with(['success' => Auth::user()->name . ', альбом добавлен!']);
        } else {
            return redirect()->route('cms.music.albums.create')
                ->withErrors(['msg' => Auth::user()->name . ', ошибка при добавлении!'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Album $album
     * @return void
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Album $album
     * @return Application|Factory|Response|View
     */
    public function edit(Album $album)
    {
        $groups = $this->albumsService->searchAllGroups();
        return view('music_test.cms.album.edit', ['album' => $album, 'groups' => $groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAlbumRequest $request
     * @param Album $album
     * @return RedirectResponse
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $data = $request->getFormData();
        $update = $this->albumsService->updateAlbum($album, $data);
        if ($update) {
            return redirect()->route('cms.music.albums.edit', $album->id)
                ->with(['success' => Auth::user()->name . ', альбом обновлен!']);
        } else {
            return back()
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
        $destroy = $this->albumsService->destroyAlbum($id);
        if ($destroy) {
            return redirect()->route('cms.music.albums.index')
                ->with(['success' => Auth::user()->name . ', альбом удален!']);
        } else {
            return back()
                ->withErrors(['msg' => Auth::user()->name . ', ошибка при удалении!'])
                ->withInput();
        }
    }
}
