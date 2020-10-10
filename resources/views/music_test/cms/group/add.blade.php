@extends('music_test.layouts.app')

@section('title-block')CreateGroup @endsection

@section('breadcrumbs', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('AddGroup'))

@section('content')

    <div class="row">
        <div class="col-md-12">
            <form id="add" method="POST" action="{{ route('cms.music.groups.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        @include('music_test.cms.group.blocks.add_main_col')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection