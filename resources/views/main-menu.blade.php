<nav class="sticky-top navbar navbar-expand-md navbar-light bg-white shadow-sm  fs-5 ">
    <div class="container">
        <a class="navbar-brand {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class=" nav-item">
                    <a class="nav-link {{ request()->routeIs('news.index') ? 'active' : '' }}"
                       href="{{ route('news.index') }}">Новости</a>
                </li>
                <li class=" nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Информация
                        о
                        проекте</a>
                </li>

                {{-- Зона админа--}}
                @auth()
                    @if(Auth::user()->name === 'Admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.index') ? 'active' : '' }}"
                               href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Редактировать
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.news.index') }}">Новости</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('admin.category.index') }}">Категории</a>
                                </li>
                            </ul>
                        </li>

                        <li class=" nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.updateProfile') ? 'active' : '' }}" href="{{
                            route('admin.updateProfile') }}">Профиль</a>
                        </li>
                    @endif
                @endauth
                {{-- Зона админа--}}

                <li class=" nav-item">
                    <a class="nav-link {{ request()->routeIs('vue') ? 'active' : '' }}"
                       href="{{ route('vue') }}">Vue</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                               href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}"
                               href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
