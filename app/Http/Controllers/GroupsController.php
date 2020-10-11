<?php

namespace App\Http\Controllers;

use App\Models\Music\Album;
use App\Models\Music\Group;
use App\Models\Music\Singer;
use App\Services\Groups\Repositories\GroupRepositoryInterface;

class GroupsController extends Controller
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


    public function index()
    {

        $groups = $this->groupRepository->search(3);
        return view('music_test.public.index', ['groups' => $groups]);
    }

    public function showAlbum($id)
    {
        $album = Album::findOrFail($id);
        $songs = $album->song()->orderBy('song_number')->get();
        return view('music_test.public.album', ['album' => $album, 'songs' => $songs]);
    }

    public function showSinger($id)
    {
        $singer = Singer::findOrFail($id);
        return view('music_test.public.singer', ['singer' => $singer]);
    }

    public function showGroup($id)
    {
        $group = Group::findOrFail($id);
        $albums = $group->album()->orderBy('release_date')->get();
        $singers = $group->singer()->orderBy('id')->get();
        return view('music_test.public.group', ['group' => $group, 'albums' => $albums, 'singers' => $singers]);
    }
}
