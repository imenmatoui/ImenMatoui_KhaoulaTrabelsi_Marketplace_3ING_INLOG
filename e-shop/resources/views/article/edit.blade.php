@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
        
           <form action="{{ url('article/' .$ar->id) }}" method="post" >
               <input type="hidden" name="_method" value="PUT">
               {{ csrf_field() }}
               <div class="form-group">               
                    <label for="">Libelle</label>
                    <input type="text" name="Libelle" class="form-control" value="{{ $ar->Libelle }}">
               </div>

               <div class="form-group">               
               <label for="">Description</label>
               <input type="text" name="Description" class="form-control" value="{{ $ar->Description }}">
          </div>

          <div class="form-group">               
               <label for="">Prix</label>
               <input type="text" name="Prix" class="form-control" value="{{ $ar->Prix }}">
          </div>      

           <div class="form-group">               
               <label for="">TauRemise</label>
               <input type="text" name="TauRemise" class="form-control" value="{{ $ar->TauRemise }}">
          </div>


          <div class="form-group">               
               <label for="">TauTva</label>
               <input type="text" name="TauTva" class="form-control" value="{{ $ar->TauTva }}">
          </div>  


          <div class="form-group">               
                    <label for="">boutique_id</label>
                    <input type="text" name="boutique_id" class="form-control" value="{{ $ar->boutique_id }}">
               </div> 

               <div class="form-group">               
                    <label for="">categorie_id</label>
                    <input type="text" name="categorie_id" class="form-control" value="{{ $ar->categorie_id }}">
               </div>          

               <div class="form-group">               

<input type="submit" class="form-control btn btn-primary" value="modifier"/>

               </div>


           </form> 


        </div>
    </div>
</div>



@endsection