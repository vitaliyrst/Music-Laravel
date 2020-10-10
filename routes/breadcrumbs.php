<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Music
Breadcrumbs::for('Music', function ($trail) {
    $trail->push('Music', route('main'));
});

// Music > Group
Breadcrumbs::for('Group', function ($trail, $group) {
    $trail->parent('Music');
    $trail->push($group->title, route('group', $group->id));
});

//Music > Group > Album
Breadcrumbs::for('Album', function ($trail, $album) {
    $trail->parent('Group', $album->group);
    $trail->push($album->title, route('album', $album->id));
});

//Music > Group > Singer
Breadcrumbs::for('Singer', function ($trail, $singer) {
    $trail->parent('Group', $singer->group);
    $trail->push($singer->name, route('singer', $singer->id));
});

//Main > Cms-Groups
Breadcrumbs::for('Cms-Groups', function ($trail) {
    $trail->parent('Music');
    $trail->push('Cms-Groups', route('cms.music.groups.index'));
});

//Cms-Groups > AddGroup
Breadcrumbs::for('AddGroup', function ($trail) {
    $trail->parent('Cms-Groups');
    $trail->push('AddGroup', route('cms.music.groups.create'));
});

//Cms-Groups > EditGroup
Breadcrumbs::for('EditGroup', function ($trail, $group) {
    $trail->parent('Cms-Groups');
    $trail->push('EditGroup' . ' / ' . $group->title, route('cms.music.groups.edit', $group->id));
});

//Main > Cms-Albums
Breadcrumbs::for('Cms-Albums', function ($trail) {
    $trail->parent('Music');
    $trail->push('Cms-Albums', route('cms.music.albums.index'));
});

//Cms-Albums > AddAlbum
Breadcrumbs::for('AddAlbum', function ($trail) {
    $trail->parent('Cms-Albums');
    $trail->push('AddAlbum', route('cms.music.albums.create'));
});

//Cms-Albums > EditAlbum
Breadcrumbs::for('EditAlbum', function ($trail, $album) {
    $trail->parent('Cms-Albums');
    $trail->push('EditAlbum' . ' / ' . $album->title, route('cms.music.albums.edit', $album->id));
});

//Main > Cms-Singers
Breadcrumbs::for('Cms-Singers', function ($trail) {
    $trail->parent('Music');
    $trail->push('Cms-Singers', route('cms.music.singers.index'));
});

//Cms-Singers > AddSinger
Breadcrumbs::for('AddSinger', function ($trail) {
    $trail->parent('Cms-Singers');
    $trail->push('AddAlbum', route('cms.music.singers.create'));
});

//Cms-Singers > EditSinger
Breadcrumbs::for('EditSinger', function ($trail, $singer) {
    $trail->parent('Cms-Singers');
    $trail->push('EditSinger' . ' / ' . $singer->name, route('cms.music.singers.edit', $singer->id));
});

//Main > Cms-Songs
Breadcrumbs::for('Cms-Songs', function ($trail) {
    $trail->parent('Music');
    $trail->push('Cms-Songs', route('cms.music.songs.index'));
});

//Cms-Songs > AddSong
Breadcrumbs::for('AddSong', function ($trail) {
    $trail->parent('Cms-Songs');
    $trail->push('AddSong', route('cms.music.songs.create'));
});

//Cms-Songs > EditSong
Breadcrumbs::for('EditSong', function ($trail, $song) {
    $trail->parent('Cms-Songs');
    $trail->push('EditSong' . ' / ' . $song->title, route('cms.music.songs.edit', $song->id));
});