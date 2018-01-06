@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
        
           <form action="{{ url('cvs') }}" method="post" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="form-group">               
                    <label for="">title</label>
                    <input type="text" name="title" class="form-control">
               </div>

               <div class="form-group">               
                    <label for="">presentation</label>
                    <input type="text" name="presentation" class="form-control">
               </div>

               <div class="form-group">               
                    <label for="">Photo</label>
                    <input type="file" name="photo" class="form-control">
               </div>              

               <div class="form-group">           
                   <input type="submit" class="form-control btn btn-primary" value="enregistrer"/>
               </div>


           </form> 


        </div>
    </div>
</div>



@endsection