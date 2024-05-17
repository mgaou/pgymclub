<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Catégorie
                                </a>

                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <!-- <a class="dropdown-item" href="#">Liste des catégories</a> -->
                                    <a class="dropdown-item" href="{{ route('category') }}">{{ __('Liste des catégories') }}</a>
                                    <a class="dropdown-item" href="{{ route('category.create') }}">Nouvelle catégorie</a>
                                </div>
                        </li>

                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Membres
                                </a>

                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <!-- <a class="dropdown-item" href="#">Liste des catégories</a> -->
                                    <a class="dropdown-item"href="{{ route('member') }}">{{ __('Membres actuels du club') }}</a>
                                    <a class="dropdown-item" href="{{ route('member.create') }}">Nouveau membre</a>
                                </div>
                        </li>
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Club
                                </a>

                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <!-- <a class="dropdown-item" href="#">Liste des catégories</a> -->
                                    <a class="dropdown-item"href="{{ route('club') }}">{{ __('Répertoire des clubs') }}</a>
                                    <a class="dropdown-item" href="{{ route('club.create') }}">Nouveau club</a>
                                </div>

                        </li>

                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Division
                                </a>

                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <!-- <a class="dropdown-item" href="#">Liste des catégories</a> -->
                                    <a class="dropdown-item"href="{{ route('division') }}">{{ __('Répertoire des divisions') }}</a>
                                    <a class="dropdown-item" href="{{ route('division.create') }}">Nouvelle division</a>
                                </div>

                        </li>
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Profession
                                </a>

                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <!-- <a class="dropdown-item" href="#">Liste des catégories</a> -->
                                    <a class="dropdown-item"href="{{ route('profession') }}">{{ __('Répertoire des professions') }}</a>
                                    <a class="dropdown-item" href="{{ route('profession.create') }}">Nouvelle profession</a>
                                </div>

                        </li>



                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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