<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">

 <title>eShop</title>

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/styleS.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>


<body >

<!-- Header Starts -->
<div class="navbar-wrapper">



    </div>
<!-- #Header Starts -->


<div class="container">




<!-- Header Starts -->
<div class="header">
<a href="{{ url('') }}"><img src="{{ asset('assets/images/logoshop.JPG' ) }}" alt="Realestate"></a>

              <ul class="pull-right">
                  <li class="nav-item">
                      <a class="nav-link" href="{{route('article.index')}}">Accueil</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="{{route('article.vetement')}}">Vêtements</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{route('article.livre')}}">Livres</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{route('article.itech')}}">I-tech</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="{{route('article.panier')}}"><img src="{{ asset('assets/images/panier.png' ) }}" witdh="30px" height="30px" alt="Realestate"></a>
                      <span class="badge-danger2">{{Session::has('panier') ? Session::get('panier')->totalQ : 0}}</span> </li>
                  @if (Auth::guest())
                    <li>
                        <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">connexion</button>
                    </li>
                  @else

                      <li class="nav-item active">
                          <a class="nav-link" href="{{route('home')}}">Commandes</a>
                      </li>

                      <li class="nav-item ">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">{{ Auth::user()->name }}</a>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 40px; left: 1270px; will-change: transform;">
                              <a class="dropdown-item" href="{{ url('/logout') }}">déconnexion</a>
                              <div class="dropdown-divider"></div>
                          </div>
                      </li>

                  @endif

              </ul>

</div>
<!-- #Header Starts -->
</div>
<div id="loginpop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-6 login">
                    <h4>Connexion</h4>
                    <form  method="POST"  action="{{ url('/login') }}"  role="form">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="sr-only" for="exampleInputEmail2">Addesse E-Mail </label>

                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enterer l'E-mail"  name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label  class="sr-only"   for="exampleInputPassword2">Password</label>

                            <input id="exampleInputPassword2" type="password" class="form-control" name="password"  placeholder="Mot de passe" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">connexion</button>
                    </form>
                </div>

                <div class="col-sm-6">
                    <h4>Inscription</h4>
                    <p>Inscrivez-vous aujourd'hui et soyez au courant de toutes les actualités High Tech.</p>
                    <button type="submit" class="btn btn-info"  onclick="window.location.href='{{ url('inscription') }}'">Inscription</button>
                </div>

            </div>
        </div>
    </div>
</div>




@yield('content')





<script src="{{ asset('assets/js/jquery.js' ) }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js' ) }}"></script>
<script src="{{ asset('assets/js/script.js' ) }}"></script>
<script src="{{ asset('assets/js/owl.carousel.js' ) }}"></script>
<script src="{{ asset('assets/js/modernizr.custom.79639.js' ) }}"></script>
<script src="{{ asset('assets/js/jquery.ba-cond.min.js' ) }}"></script>
<script src="{{ asset('assets/js/jquery.slitslider.js' ) }}"></script>




</body>
</html>
