@extends('layouts.master') @section('content')

        @if(!Session::has('panier'))
            <h3>Votre panier est vide</h3>
        @else
            <h3>Votre panier</h3>
            <table class="table table-hover">
                @foreach($items as $item)
                <thead>
                <tr>
                    <th scope="col">{{$item['item']->Description}} </th>
                    <th scope="col"> x</th>
                    <th scope="col">{{$item['quantite']}}</th>
                    <th scope="col"><span class="badge-danger">{{$item['prix']}} €</span></th>
                    <th><a href="{{route('article.reduce', ['id' => $item['item']->id])}}">
                        <i class="fa fa-minus-square" aria-hidden="true">minimiser</i>
                    </a></th>
                    <th>
                    <a href="{{route('article.delete', ['id' => $item['item']->id])}}">
                        <i class="fa fa-trash" aria-hidden="true">supprimer</i>
                    </a>
                    </th>
                </tr>
                </thead>

                @endforeach
            </table>
        @endif


    <span class="pull-right badge">Total à payer: {{$totalP}} €</span><br><br>
    <a href="{{route('article.checkout')}}" class="btn btn-info">Passer au paiement</a>
@endsection