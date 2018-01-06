@extends('layouts.app')

@section('content')


<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <h2>Boutique</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="col-lg-12  ">

<table width="1300px">

<tr>
    <th>nom</th>

</tr>

<tr>
    <td>{{$v2}}</td>

    <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<form action="{{ url('boutique/'.$v1) }}" method="post">

     {{ csrf_field() }}
     {{ method_field('DELETE') }}

     <a href="{{ url('boutique/'.$v1.'/show') }}" >details</a>&nbsp;&nbsp;&nbsp;
     <a href="{{ url('boutique/'.$v1.'/edit') }}" >modifier</a>&nbsp;&nbsp;&nbsp;

      <button type="submit" class="badge-danger2" >supprimer </button>
</form>



    </td> 
</tr>

</table>



  


  </div>



  </div>
</div>
</div>
</div>
</div>
</div>





@endsection