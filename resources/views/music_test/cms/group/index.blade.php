@extends('music_test.layouts.app')

@section('title-block')Groups @endsection

@section('breadcrumbs', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('Cms-Groups'))

@section('content')

    <div>
        <div class="row mb-3">
            <div class="col-3">
                <a class="btn btn-dark btn-block active" role="button" aria-pressed="true"
                   href="{{ route('cms.music.groups.create') }}">Новая запись</a>
            </div>
            <div class="col-3">
                <a class="btn btn-dark btn-block active" role="button" aria-pressed="true"
                   href="{{ route('cms.music.albums.index') }}">Альбомы</a>
            </div>
            <div class="col-3">
                <a class="btn btn-dark btn-block active" role="button" aria-pressed="true"
                   href="{{ route('cms.music.singers.index') }}">Исполнители</a>
            </div>
            <div class="col-3">
                <a class="btn btn-dark btn-block active" role="button" aria-pressed="true"
                   href="{{ route('cms.music.songs.index') }}">Треки</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-active">
                    <thead>
                    <tr class="bg-dark text-white">
                        <th>id</th>
                        <th>группа</th>
                        <th>пользователь</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td>{{ $group->title }}</td>
                            <td>{{ $group->user->name }}</td>
                            <td><a href="{{ route('cms.music.groups.edit', $group->id) }}">
                                    <img src="/storage/buttons/edit.png" class="edit-img">
                                </a>
                                <button class="btn-1" form="delete">
                                    <img src="/storage/buttons/delete.png" class="edit-img">
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <form method="post" id="delete" action="{{ route('cms.music.groups.destroy', $group->id) }}">
                @method('DELETE')
                @csrf
            </form>
            <div class="container">
                {{ $groups->links() }}
            </div>
        </div>
    </div>
@endsection



