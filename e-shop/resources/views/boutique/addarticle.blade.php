@extends('layouts.app')

@section('content')

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{ url('boutique') }}">Boutique</a>  </span>
    <h2>Boutique</h2>
</div>
</div>
<!-- banner -->


<div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
        
           <form action="{{ url('addArticle2') }}" method="post"  enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="form-group">               
                    <input type="text" placeholder="Libelle" name="Libelle" class="form-control">
               </div>

               <div class="form-group">               
                    <input type="text" placeholder="Description" name="Description" class="form-control">
               </div>

               <div class="form-group">               
                    <input type="text" placeholder="Prix" name="Prix" class="form-control">
               </div>      

                <div class="form-group">               
                    <input type="text" placeholder="Remise" name="TauRemise" class="form-control">
               </div>


               <div class="form-group">               
                    <input type="text" placeholder="TVA" name="TauTva" class="form-control">
               </div>                                     


               <div class="form-group">               
                    <input type="hidden" name="boutique_id" value="{{$bt->id}}" class="form-control">
               </div> 

               <div class="form-group">              
                <select class="form-control" name="item">
                    @foreach($items as $item)
                    <option name="categorie_id" value="{{$item->id}}">{{$item->Libelle}}</option>
                    @endforeach
                </select>
               </div>

               <div class="form-group">               
                    <input type="file" placeholder="Photo" name="photo" class="form-control">
               </div>


               <div class="form-group">           
                   <input type="submit" class="form-control btn btn-primary" value="enregistrer"/>
               </div>


           </form> 


        </div>
    </div>
</div>



@endsection