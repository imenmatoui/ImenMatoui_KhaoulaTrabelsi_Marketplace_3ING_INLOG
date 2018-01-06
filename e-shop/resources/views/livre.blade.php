@extends('layouts.master')
@section('content')
    <div class="">


        <!-- banner -->
        <div class="container">

            <div class="row">

                <!-- properties -->
                @foreach($articles as $article)
                    <div class="col-lg-4 col-sm-4">
                        <div class="properties">
                            <div class="image-holder"><img src="{{ asset($article->photo) }}" width="360px" height="300px" alt="properties">

                            </div>
                            <h4><a href="{{ url('boutique/'.$article->$article.'/detailArticle') }}">{{$article->Libelle}}</a></h4>
                            <p class="price">Prix : {{$article->Prix}}</p>
                            <a class="btn btn-primary" href="{{route('article.ajouter1', ['id' => $article->id])}}">Acheter</a>

                        </div>
                    </div>
                    <!-- properties -->
                @endforeach

            </div>
        </div></div>
    <!-- /.modal -->







@endsection