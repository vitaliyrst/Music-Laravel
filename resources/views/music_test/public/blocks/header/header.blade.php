<header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-dark">
        <div class="mr-md-auto">
            <a class="navbar-brand text-white" href="{{ route('main') }}">
                <b>My</b>Music
            </a>
        </div>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-white-50" href="{{ route('cms.music.groups.index') }}">Admin</a>
            <a class="p-2 text-white-50" href="{{ route('gallery') }}">Gallery</a>
            <a class="p-2 text-white-50" href="">Contact</a>
            <a class="p-2 text-white-50" href="{{ route('register') }}">Registration</a>
        </nav>
        @include('music_test.public.blocks.header.login')
    </div>
</header>
