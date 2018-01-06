<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{route('article.index')}}">Accueil</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Commandes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('article.panier')}}">Panier</a>
            </li><li><span class="badge-danger">{{Session::has('panier') ? Session::get('panier')->totalQ : 0}}</span></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a class="btn btn-success" href="{{ url('/login') }}">Login</a></li>
            <li>&nbsp;&nbsp;</li>
                <li><a class="btn btn-success" href="{{ url('/register') }}">Register</a></li>
            @else

                <li class="nav-item dropdown show">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"> {{ Auth::user()->name }}</a>
                    <div class="dropdown-menu show" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item" href="{{ url('/logout') }}">déconnexion</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>

            @endif
        </ul>




        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>