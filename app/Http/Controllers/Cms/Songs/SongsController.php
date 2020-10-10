<?php

namespace App\Http\Controllers\Cms\Songs;

use App\Http\Controllers\Cms\BaseController;
use App\Http\Requests\Album\StoreAlbumRequest;
use App\Http\Requests\Song\StoreSongRequest;
use App\Http\Requests\Song\UpdateSongRequest;
use App\Models\Music\Album;
use App\Models\Music\Group;
use App\Models\Music\Song;
use App\Services\Songs\SongsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SongsController extends BaseController
{
    /**
     * @var SongsService
     */
    private $songsService;

    public function __construct(SongsService $songsService)
    {
        $this->songsService = $songsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $groups = $this->songsService->searchGroupsWithAlbums();
        return view('music_test.cms.song.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Song $song
     * @return Application|Factory|Response|View
     */
    public function create(Song $song)
    {
        $groups = $this->songsService->searchGroupsWithAlbums();
        return view('music_test.cms.song.add', ['song' => $song, 'groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSongRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSongRequest $request)
    {
        $data = $request->getFormData();
        $store = $this->songsService->storeAlbum($data);
        if ($store) {
            return redirect()->route('cms.music.songs.create')
                ->with(['success' => Auth::user()->name . ', трек добавлен!']);
        } else {
            return redirect()->route('cms.music.songs.create')
                ->withErrors(['msg' => Auth::user()->name . ', ошибка при добавлении!'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Song $song
     * @return Response
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Song $song
     * @return Application|Factory|Response|View
     */
    public function edit(Song $song)
    {
        $groups = $this->songsService->searchGroups();
        $albums = $this->songsService->searchAlbums();
        return view('music_test.cms.song.edit', ['song' => $song, 'groups' => $groups, 'albums' => $albums ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSongRequest $request
     * @param Song $song
     * @return RedirectResponse
     */
    public function update(UpdateSongRequest $request, Song $song)
    {
        $album = Album::where('id', $song->album_id)->get();
        $data = $request->getFormData();
        $update = $this->songsService->updateSong($song, $data);
        if ($update) {
            return redirect()->route('cms.music.songs.edit', $song->id)
                ->with(['success' => Auth::user()->name . ', трек обновлен!']);
        } else {
            return redirect()->route('cms.music.songs.edit')
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
        $destroy = $this->songsService->destroySong($id);
        if ($destroy) {
            return redirect()->route('cms.music.songs.index')
                ->with(['success' => Auth::user()->name . ', трек удален!']);
        } else {
            return back()
                ->withErrors(['msg' => Auth::user()->name . ', ошибка при удалении!'])
                ->withInput();
        }
    }
}
