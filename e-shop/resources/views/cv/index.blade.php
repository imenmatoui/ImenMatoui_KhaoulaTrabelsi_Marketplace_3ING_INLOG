@extends('layouts.master')
@section('content')





<div class="row">
<table>
<form action="{{ url('search') }}"  method="post"> 
{{ csrf_field() }}
<tr>
<td>search </td>
<td><input type="text" name="search"></td>
<input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
<td><input type="submit" name="Submit" value="chercher"></td>
</tr>
</form>
</table>
<br>

@foreach($cvs as $cv)

<div class="col-lg-4 col-sm-6">
<h4>{{$cv->title}}</h4>
<h4>{{$cv->presentation}}</h4>
</div>
@endforeach



</div>

@endsection