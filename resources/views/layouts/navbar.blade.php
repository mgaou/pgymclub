<div class="offcanvas offcanvas-start w-15" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">
<div class="offcanvas-header">
    <h6 class="offcanvas-title d-none d-sm-block" id="offcanvas">Menu</h6>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body px-0">
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
    @auth
    <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link text-truncate">
                <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">{{ config('app.name', 'Laravel') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/') }}" data-bs-toggle="collapse" class="nav-link text-truncate">
                <i class="fs-5 bi-speedometer2"></i><span class="ms-1 d-none d-sm-inline">Tableau de bord</span> </a>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link dropdown-toggle  text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Categorie</span>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdown">
                <li><a class="dropdown-item" href="{{route('category.index')}}">Liste des categories</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{route('category.create')}}">Nouvelle categorie</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link dropdown-toggle  text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fs-5 bi-person-arms-up"></i><span class="ms-1 d-none d-sm-inline">Membre</span>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdown">
                <li><a class="dropdown-item" href="{{route('member.index')}}">Liste des membres</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{route('member.create')}}">Nouveau membre</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link dropdown-toggle  text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Division</span>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdown">
                <li><a class="dropdown-item" href="{{route('division.index')}}">Liste des divisions</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{route('division.create')}}">Nouvelle division</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link dropdown-toggle  text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Club</span>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdown">
                <li><a class="dropdown-item" href="{{route('club.index')}}">Liste des clubs</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{route('club.create')}}">Nouveau club</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link dropdown-toggle  text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Profession</span>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdown">
                <li><a class="dropdown-item" href="{{route('profession.index')}}">Liste des professions</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{route('profession.create')}}">Nouvelle profession</a></li>
            </ul>
        </li>
    @endauth
        
        <li class="dropdown">
            <a href="#" class="nav-link dropdown-toggle  text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fs-5 bi-people"></i><span class="ms-1 d-none d-sm-inline">Connexion</span>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdown">
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a class="dropdown-item" href="#">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </li>
    </ul>
</div>
</div>