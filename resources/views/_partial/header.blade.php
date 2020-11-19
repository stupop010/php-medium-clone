<header>
    <nav class="py-2 bg-white" id='navbar'>
        <div class="container d-flex justify-content-between align-items-baseline">
            <a class="logo" href="{{ url('/') }}">
                Chimmi
            </a>

            <div id='nav-list'>
                <ul class="d-flex nav">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="{{ Request::is('login') ? 'nav-link px-2 active' : 'nav-link px-2'}}" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ Request::is('register') ? 'nav-link px-2 active' : 'nav-link px-2'}}" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                    </li>
                    @endguest

                    @auth
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'nav-link px-2 active' : 'nav-link px-2'}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/editor') }}" class="{{ Request::is('editor') ? 'nav-link px-2 active' : 'nav-link px-2'}}"><i class="far fa-edit"></i> New Article</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/setting') }}" class="{{ Request::is('setting') ? 'nav-link px-2 active' : 'nav-link px-2'}}"><i class="fas fa-cog"></i> Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2" href="/profile/{{ Auth::user()->username }}" role="button">
                            {{ Auth::user()->username }}
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>

            <div id='hamburger'>
                <div>
                    <i class="fas fa-bars fa-lg"></i>
                </div>
            </div>

            <div id='menu'>
                <div class='menu-content d-flex flex-column'>
                    <div id='closeMenu' class="align-self-end m-2 p-2"><i class="fas fa-times fa-2x"></i></div>
                    <ul class="mx-4">
                        @guest
                        <li class="nav-item">
                            <a class="{{ Request::is('login') ? 'nav-link px-2 active' : 'nav-link px-2'}}" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{ Request::is('register') ? 'nav-link px-2 active' : 'nav-link px-2'}}" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                        </li>
                        @endguest

                        @auth
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'nav-link active' : 'nav-link'}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/editor') }}" class="{{ Request::is('editor') ? 'nav-link active' : 'nav-link'}}"><i class="far fa-edit"></i> New Article</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/setting') }}" class="{{ Request::is('setting') ? 'nav-link active' : 'nav-link'}}"><i class="fas fa-cog"></i> Setting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2" href="/profile/{{ Auth::user()->username }}" role="button">
                                {{ Auth::user()->username }}
                            </a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

@push('page-scripts')
<script type="text/javascript">
    let el = document.getElementById('hamburger');
    let elMenu = document.getElementById('menu');
    let elClose = document.getElementById('closeMenu');

    el.addEventListener("click", openMenu)
    elClose.addEventListener('click', closeMenu)

    function openMenu() {
        elMenu.classList.add('menu-open')
        elMenu.classList.remove('menu-close')
    }

    function closeMenu() {
        elMenu.classList.add('menu-close')
        elMenu.classList.remove('menu-open')
    }
</script>
@endpush