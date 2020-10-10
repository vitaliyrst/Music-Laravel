@extends ('music_test.layouts.app')

@section('content')

    <div class="card" style="width:600px">
        <img class="card-img-top" src="" alt="Card image">
        <div class="card-body">
            <h4 class="card-title">{{ $user->name }}</h4>
            <p class="card-text">Some example text.</p>
            <a href="#" class="btn btn-primary">Редактировать</a>
        </div>
    </div>

@endsection