@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
        
           <form action="{{ url('cvs/' .$cv->id) }}" method="post" >
               <input type="hidden" name="_method" value="PUT">
               {{ csrf_field() }}
               <div class="form-group">               
                    <label for="">title</label>
                    <input type="text" name="title" class="form-control" value="{{ $cv->title }}">
               </div>

               <div class="form-group">               
                    <label for="">presentation</label>
                    <input type="text" name="presentation" class="form-control" value="{{ $cv->presentation}}">
               </div>

               <div class="form-group">               

<input type="submit" class="form-control btn btn-primary" value="modifier"/>

               </div>


           </form> 


        </div>
    </div>
</div>



@endsection