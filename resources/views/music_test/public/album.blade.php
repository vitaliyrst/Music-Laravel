@extends('music_test.layouts.app')

@section('title-block'){{ $album->title }} @endsection

@section('breadcrumbs', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('Album', $album))

@section('content')

    <div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <div class="text-white">{{ $album->title }}</div>
                    </div>
                    <div class="card-body">
                        <div>
                            <img src="{{ $album->cover }}" class="album-img img-fluid float-left mr-3 mb-3">
                            <p>{{ $album->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-dark">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Длительность</th>
                        <th>Ссылка</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($songs as $song)
                        <tr>
                            <td>{{ $song->song_number }}</td>
                            <td>{{ $song->title }}</td>
                            <td>{{ $song->duration }}</td>
                            <td><a href="#"></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
