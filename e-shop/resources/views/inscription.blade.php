@extends('layouts.master')
@section('content')

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="">Home</a> / Register</span>
    <h2>Inscription</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">


                
                    <form class="form-horizontal" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           
                                <input id="name" placeholder="Nom" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           
                                <input id="email" placeholder="Adresse E-Mail" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">                      
                                <input id="password" placeholder="Mot de passe" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif                  
                        </div>

                        <div class="form-group">                 
                                <input id="password-confirm" placeholder="Confirmation mot de passe"  type="password" class="form-control" name="password_confirmation" required>                      
                        </div>
            
                        <button type="submit" class="btn btn-success"> Créer compte  </button>
                    </form>
             
            </div>
        </div>
    </div>
</div>








@endsection