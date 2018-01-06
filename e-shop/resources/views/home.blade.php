@extends('layouts.master') @section('content')

    <h3>Mes commandes</h3>
    @if(count($acheteurs) <= 0)
        <h4>Vous n'avez jamais passé commande!</h4>
    @else
        &nbsp;&nbsp;
        @foreach($acheteurs as $acheteur)
            <div class="card border-primary mb-1" style=" margin-left : 300px;max-width: 80rem;">
                <div class="card-header">La commande du {{date('d/m/Y', strtotime($acheteur->created_at))}}</div>
                <div class="card-body text-primary">
                    @foreach($acheteur->panier->items as $item)
                        <table width="1000px"><tr><td width="700px"><p class="card-text"><strong>{{$item['item']->Description}}</strong> x {{$item['quantite']}}</p></td><td width="400px"><span class="badge-danger">{{$item['prix']}} €</span></td></tr></table>

                    @endforeach
                </div>
            </div>
            @endforeach

            @endif


@endsection
