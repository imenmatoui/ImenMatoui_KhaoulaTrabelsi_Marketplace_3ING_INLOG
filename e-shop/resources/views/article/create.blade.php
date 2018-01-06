@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
        
           <form action="{{ url('article') }}" method="post" >
               {{ csrf_field() }}
               <div class="form-group">               
                    <label for="">Libelle</label>
                    <input type="text" name="Libelle" class="form-control">
               </div>

               <div class="form-group">               
                    <label for="">Description</label>
                    <input type="text" name="Description" class="form-control">
               </div>

               <div class="form-group">               
                    <label for="">Prix</label>
                    <input type="text" name="Prix" class="form-control">
               </div>      

                <div class="form-group">               
                    <label for="">TauRemise</label>
                    <input type="text" name="TauRemise" class="form-control">
               </div>


               <div class="form-group">               
                    <label for="">TauTva</label>
                    <input type="text" name="TauTva" class="form-control">
               </div>                                     


               <div class="form-group">               
                    <label for="">boutique_id</label>
                    <input type="text" name="boutique_id" class="form-control">
               </div> 



               <div class="form-group">              
                <select class="form-control" name="item">
                    @foreach($items as $item)
                    <option value='{{$item->Libelle}}'>{{$item->Libelle}}</option>
                    @endforeach
                </select>
               </div>



               <div class="form-group">           
                   <input type="submit" class="form-control btn btn-primary" value="enregistrer"/>
               </div>


           </form> 


        </div>
    </div>
</div>



@endsection