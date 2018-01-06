@extends('layouts.app')

@section('content')

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{ url('boutique') }}">Boutique</a> / Nouveau boutique </span>
    <h2>Boutique</h2>
</div>
</div>
<!-- banner -->

<div class="container" style="margin-top:50px;">
<div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
        
           <form action="{{ url('boutique/' .$bt->id) }}" method="post" >
               <input type="hidden" name="_method" value="PUT">
               {{ csrf_field() }}
               <div class="form-group">               
                    <input type="text"  placeholder="Nom" name="Nom" class="form-control" value="{{ $bt->Nom }}">
               </div>

               <div class="form-group">               
                    <input type="text" placeholder="Adresse"  name="Adresse" class="form-control" value="{{ $bt->Adresse}}">
               </div>

               <div class="form-group">               
                    <input type="text"  placeholder="Tel" name="Tel" class="form-control" value="{{ $bt->Tel}}">
               </div>               

               <div class="form-group">               

<input type="submit" class="btn btn-success" value="Modifier"/>

               </div>


           </form> 


        </div>
    </div>
</div>



@endsection