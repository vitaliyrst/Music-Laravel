@if(!Auth::user())
    <a class="btn text-white" href="{{ route('login') }}">Sign in</a>
@else
    <a id="navbarDropdown" class="text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
    </a>
@endif
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('profile', \Illuminate\Support\Facades\Auth::user()->id) }}">
        {{ __('Profile') }}
    </a>
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>