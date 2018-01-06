@extends('layouts.master')
@section('content')
    <div class="">


        <div id="slider" class="sl-slider-wrapper">

            <div class="sl-slider">

                <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                    <div class="sl-slide-inner">

                        <div class="bg-img bg-img-1">
                            <img src="{{ asset('assets/images/properties/1.jpg' ) }}" alt="Realestate"  style="width:100%">
                        </div>

                    </div>
                </div>

                <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                    <div class="sl-slide-inner">

                        <div class="bg-img bg-img-2">
                            <img src="{{ asset('assets/images/properties/2.jpg' ) }}" alt="Realestate" style="width:100%">
                        </div>


                    </div>
                </div>

                <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                    <div class="sl-slide-inner">

                        <div class="bg-img bg-img-3">
                            <img src="{{ asset('assets/images/properties/3.jpg' ) }}" alt="Realestate" style="width:100%">
                        </div>


                    </div>
                </div>

                <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
                    <div class="sl-slide-inner">

                        <div class="bg-img bg-img-3">
                            <img src="{{ asset('assets/images/properties/4.jpg' ) }}" alt="Realestate" style="width:100%">
                        </div>


                    </div>
                </div>

                <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                    <div class="sl-slide-inner">

                        <div class="bg-img bg-img-4">
                            <img src="{{ asset('assets/images/properties/5.jpg' ) }}" alt="Realestate" style="width:100%">
                        </div>


                    </div>
                </div>
            </div><!-- /sl-slider -->



            <nav id="nav-dots" class="nav-dots">
                <span class="nav-dot-current"></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </nav>

        </div><!-- /slider-wrapper -->
    </div>



    <div class="banner-search">
        <div class="container">
            <!-- banner -->
            <h3>Buy, Sale & Rent</h3>
            <div class="searchbar">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Search of Properties">
                        <div class="row">
                            <div class="col-lg-3 col-sm-3 ">
                                <select class="form-control">
                                    <option>Buy</option>
                                    <option>Rent</option>
                                    <option>Sale</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control">
                                    <option>Price</option>
                                    <option>$150,000 - $200,000</option>
                                    <option>$200,000 - $250,000</option>
                                    <option>$250,000 - $300,000</option>
                                    <option>$300,000 - above</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control">
                                    <option>Property</option>
                                    <option>Apartment</option>
                                    <option>Building</option>
                                    <option>Office Space</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <button class="btn btn-success"  onclick="window.location.href='{{ url('details') }}'">recherche</button>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">   </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner -->
    <div class="container">
        <div class="properties-listing spacer"> <a href="{{ url('details') }}" class="pull-right viewall">View All Listing</a>
            <br>
            <div id="owl-example" class="owl-carousel">
                @foreach($articles as $article)
                    <div class="properties">
                        <div class="image-holder"><img src="{{ asset($article->photo) }}" width="200px" height="200px" alt="properties"/></div>
                        <h4><a href="">{{$article->Description}}</a></h4>
                        <p class="price">{{$article->Prix}} €</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
                        <a class="btn btn-primary" href="{{route('article.ajouter', ['id' => $article->id])}}">Acheter</a>
                    </div>

                @endforeach

            </div>

                </div>
            </div>




    <!-- Modal -->
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
                            <button type="submit" class="btn btn-success">connexion </button>
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
    <!-- /.modal -->







@endsection