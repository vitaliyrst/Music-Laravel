@extends('music_test.layouts.app')

@section('title-block')CreateAlbum @endsection

@section('breadcrumbs', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('AddAlbum'))

@section('content')

    <div class="row">
        <div class="col-md-12">
            <form id="add" method="POST" action="{{ route('cms.music.albums.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        @include('music_test.cms.album.blocks.add_main_col')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection