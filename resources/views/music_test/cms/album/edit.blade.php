@extends('music_test.layouts.app')

@section('title-block'){{ $album->title }} @endsection

@section('breadcrumbs', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('EditAlbum', $album))

@section('content')

    <form id="update" method="POST" action="{{ route('cms.music.albums.update', $album->id) }}"
          enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('music_test.cms.album.blocks.edit_main_col')
            </div>
            <div class="col-md-4">
                @include('music_test.cms.album.blocks.edit_additional_col')
            </div>
        </div>
    </form>
    <form id="delete" method="POST" action="{{ route('cms.music.albums.destroy', $album->id) }}">
        @method('DELETE')
        @csrf
    </form>
@endsection
