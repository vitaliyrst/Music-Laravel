@extends('music_test.layouts.app')

@section('title-block')Music @endsection

@section('breadcrumbs', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('Music'))

@section('content')

    <div>
        <div class="row mb-5">
            @foreach($groups as $group)
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <a href="{{ route('group', $group->id) }}" class="text-white">
                                {{ $group->title }}
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('group', $group->id) }}">
                                <img src="{{ $group->cover }}" class="group-img img-fluid float-left mr-3">
                            </a>
                            <p>{{ $group->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="container">
                    {{ $groups->links() }}
                </div>
        </div>
    </div>
@endsection
