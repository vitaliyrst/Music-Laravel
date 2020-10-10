@extends('music_test.layouts.app')

@section('title-block'){{ $singer->name }} @endsection

@section('breadcrumbs', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('EditSinger', $singer))

@section('content')

    <form id="update" method="POST" action="{{ route('cms.music.singers.update', $singer->id) }}"
          enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('music_test.cms.singer.blocks.edit_main_col')
            </div>
            <div class="col-md-4">
                @include('music_test.cms.singer.blocks.edit_additional_col')
            </div>
        </div>
    </form>
    <br>
    <form id="delete" method="POST" action="{{ route('cms.music.singers.destroy', $singer->id) }}">
        @method('DELETE')
        @csrf
    </form>
@endsection
