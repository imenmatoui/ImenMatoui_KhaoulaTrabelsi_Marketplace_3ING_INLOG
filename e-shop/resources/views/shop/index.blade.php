@extends('layout.layout')

@section('content')

<div class="row">
    @foreach($articles as $article)
        <div class="col-sm-6 col-xs-12 col-md-4">
            <div class="thumbnail">
                <img src="{{$article->image}}" whidth="200px" height="200px">
                <div class="caption">
                    <h3>{{$article->titre}}</h3>
                    <h2>{{$article->Prix}} €</h2>
                    <p>{{$article->Description}}</p>
                    <p>
                        <a href="{{route('article.ajouter', ['id' => $article->id])}}" class="btn btn-primary" role="button">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter au panier</a>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
    </div>
{{$articles->links()}}
@endsection
