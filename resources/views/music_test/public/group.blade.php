@extends('music_test.layouts.app')

@section('title-block'){{ $group->title }} @endsection

@section('breadcrumbs', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('Group', $group))

@section('content')

    <div>
        <div class="mb-2">
            <h4>{{ $group->title }}</h4>
        </div>
        @foreach($singers as $singer)
            <div class="mb-2">
                {{ $singer->position }}:
                <a href="{{ route('singer', $singer->id) }}" class="text-dark">{{$singer->name}}</a>
            </div>
        @endforeach
    </div>
    <div class="row">
        @foreach($albums as $album)
            <div class="col-4 mb-3">
                <div class="card mb-3">
                    <div class="card-header bg-dark">
                        <a href="{{ route('album', $album->id) }}" class="text-white">{{ $album->title }}</a>
                    </div>
                    <div>
                        <a href="{{ route('album', $album->id) }}">
                            <img src="{{ $album->cover }}" class="album-img img-fluid w-100 h-100">
                        </a>

                    </div>
                    <div class="card-footer">
                        <div>Релиз {{ $album->release_date }}</div>
                        <div>Лейбл ®{{ $album->label }}</div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection
