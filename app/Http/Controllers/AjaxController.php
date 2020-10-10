<?php

namespace App\Http\Controllers;

use App\Models\Music\Group;
use App\Models\Music\Album;
use App\Models\Music\Song;
use App\Models\Music\Singer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class AjaxController
 * @package App\Http\Controllers
 */
class AjaxController
{
    /**
     * @param $id
     * @return false|string
     */
    public function ajaxAlbum($id)
    {
        $albums = Album::where('group_id', $id)
            ->orderBy('release_date')
            ->with('user')
            ->get();
        return json_encode($albums);
    }

    /**
     * @param $id
     * @return false|string
     */
    public function ajaxSinger($id)
    {
        $singers = Singer::where('group_id', $id)
            ->orderBy('id')
            ->with('user')
            ->get();
        return json_encode($singers);
    }

    /**
     * @param $id
     * @return false|string
     */
    public function ajaxSong($id)
    {
        $songs = Song::where('album_id', $id)
            ->orderBy('song_number')
            ->with('user')
            ->get();
        return json_encode($songs);
    }


//    /**
//     * @return Application|Factory|View
//     */
//    public function getGroup()
//    {
//        $groups = Group::orderBy('id', 'desc')->get();
//        return view('music_test.cms.group.index', ['groups' => $groups]);
//    }
//
//    /**
//     * @return Application|Factory|View
//     */
//    public function getSinger()
//    {
//        $groups = Group::orderBy('id', 'desc')->get();
//        return view('music_test.cms.singer.index', ['groups' => $groups]);
//    }
//
//    /**
//     * @param Album $album
//     * @return Application|Factory|View
//     */
//    public function getAlbum()
//    {
//        $albums = Album::orderBy('id', 'desc')->get();
//        return view('music_test.cms.album.index', ['albums' => $albums]);
//    }
}