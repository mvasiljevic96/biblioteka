<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">
    <div class="container">
        <!-- Naslov biblioteka -->
        <a class="navbar-brand text-primary font-weight-bold text-uppercase" href="{{ url('/') }}" style="font-size: 1.5rem; font-weight: 900;">
            <i class="ion-md-book"></i> Biblioteka
        </a>

        <!-- Toggler za mobilne uređaje -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Leva strana navigacije -->
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('home') }}">
                            <i class="ion-md-home"></i> Početna
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('users.index') }}">
                            <i class="ion-md-list-box"></i> Moje rezervacije
                        </a>
                    </li>

                   
                 
                 
                    
                    <!-- Dugme Admin panel -->
                    @if(Auth::check() && Auth::user()->tip === 'bibliotekar')
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('admins.index') }}">
                            <i class="ion-md-settings"></i> Lista korisnika
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('knjigas.create') }}">
                            <i class="ion-md-book"></i> Dodaj knjigu
                        </a>
                    </li>
                    @endif
                    
                @endauth
            </ul>

            <!-- Desna strana navigacije -->
            <ul class="navbar-nav ml-auto">
                @guest
                    <!-- Dodavanje linkova za goste ako je potrebno -->
                @else
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="ion-md-log-out"></i> Logout
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>
        </div>
    </div>
</nav>
