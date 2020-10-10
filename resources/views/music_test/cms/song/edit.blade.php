@extends('music_test.layouts.app')

@section('title-block'){{ $song->title }} @endsection

@section('breadcrumbs', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('EditSong', $song))

@section('content')

    <form id="update" method="POST" action="{{ route('cms.music.songs.update', $song->id) }}">
        @method('PATCH')
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('music_test.cms.song.blocks.edit_main_col')
            </div>
            <div class="col-md-4">
                @include('music_test.cms.song.blocks.edit_additional_col')
            </div>
        </div>
    </form>
    <br>
    <form id="delete" method="POST" action="{{ route('cms.music.songs.destroy', $song->id) }}">
        @method('DELETE')
        @csrf
    </form>
@endsection
