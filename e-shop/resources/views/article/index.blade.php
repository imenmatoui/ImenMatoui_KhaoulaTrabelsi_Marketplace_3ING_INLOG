@extends('layouts.app')

@section('content')

<a href="{{url('article/create')}}">nouveau </a>
<table>

<tr>
    <th>titre</th>
    <th>action</th>
</tr>
@foreach($arts as $ar)
<tr>
    <td>{{$ar->Libelle}}</td>

    <td> 




<form action="{{ url('article/'.$ar->id) }}" method="post">

     {{ csrf_field() }}
     {{ method_field('DELETE') }}

     <a href="" >details</a>
     <a href="{{ url('article/'.$ar->id.'/edit') }}" >edit</a>

      <button type="submit"  >supprimer </button>
</form>



    </td> 
</tr>
@endforeach
</table>


@endsection