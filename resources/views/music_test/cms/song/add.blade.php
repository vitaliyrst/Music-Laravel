@extends('music_test.layouts.app')

@section('title-block')CreateSong @endsection

@section('breadcrumbs', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('AddSong'))

@section('content')

    <div class="row">
        <div class="col-md-12">
            <form id="add" method="POST" action="{{ route('cms.music.songs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        @include('music_test.cms.song.blocks.add_main_col')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection