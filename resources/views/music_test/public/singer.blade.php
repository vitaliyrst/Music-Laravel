@extends('music_test.layouts.app')

@section('title-block'){{ $singer->name }} @endsection

@section('breadcrumbs', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('Singer', $singer))

@section('content')

    <div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <div class="text-white">{{ $singer->name }}</div>
                    </div>
                    <div class="card-body">
                        <div>
                            <img src="{{ $singer->cover }}" class="album-img img-fluid float-left mr-3 mb-3">
                            <p>{{ $singer->description }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
