@extends('music_test.layouts.app')

@section('title-block'){{ $group->title }} @endsection

@section('breadcrumbs', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('EditGroup', $group))

@section('content')

    <div>
        <form id="update" method="POST" action="{{ route('cms.music.groups.update', $group->id) }}"
              enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('music_test.cms.group.blocks.edit_main_col')
                </div>
                <div class="col-md-4">
                    @include('music_test.cms.group.blocks.edit_additional_col')
                </div>
            </div>
        </form>
    </div>

@endsection
