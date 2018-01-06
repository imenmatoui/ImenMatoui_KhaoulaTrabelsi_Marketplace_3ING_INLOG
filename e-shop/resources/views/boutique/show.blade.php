@extends('layouts.app')
@section('content')


<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
<script src="{{ asset('assets/js/jquery-1.10.2.js' ) }}"></script>
<script src="{{ asset('assets/js/jquery-ui.js' ) }}"></script>



<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
  <span class="pull-right"><a href=" {{ url('boutique/'.$v1.'/addArticle') }} " >Nouveau Articles / <a href="{{ url('boutique') }}">Boutique</a>  </a></span>
    <h2>Articles</h2>
</div>
</div>
<!-- banner -->

<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Recherche </h4>
   
      <form action="{{ url('search/'.$v1) }}"  method="post"> 
        {{ csrf_field() }}
        <input type="text" name="search" id="search"   class="form-control" placeholder="Recherche des articles">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

    <div class="row">
            <div class="col-lg-5">
              <select class="form-control">
                <option>Buy</option>
                <option>Rent</option>
                <option>Sale</option>
              </select>
            </div>
            <div class="col-lg-7">
              <select class="form-control">
                <option>Price</option>
                <option>$150,000 - $200,000</option>
                <option>$200,000 - $250,000</option>
                <option>$250,000 - $300,000</option>
                <option>$300,000 - above</option>
              </select>
            </div>
          </div>

          <div class="row">
          <div class="col-lg-12">
              <select class="form-control">
                <option>Property Type</option>
                <option>Apartment</option>
                <option>Building</option>
                <option>Office Space</option>
              </select>
              </div>
          </div>
          <button type="submit" class="btn btn-primary">Recherche</button>
   </form>
  </div>



  





</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
  <div class="pull-right">
  <select class="form-control">
  <option>Sort by</option>
  <option>Price: Low to High</option>
  <option>Price: High to Low</option>
</select></div>

</div>


<div class="row">

     <!-- properties -->
     @foreach($bts as $bt)
      <div class="col-lg-4 col-sm-4">
      <div class="properties">
        <div class="image-holder"><img src="{{ asset($bt->photo) }}"  width="240px" height="240px" >

        </div>
        <h4><a href="{{ url('boutique/'.$bt->id.'/detailArticle') }}">{{$bt->Libelle}}</a></h4>
        <p class="price">Prix : {{$bt->Prix}}</p>
        <a class="btn btn-primary" href="{{ url('boutique/'.$bt->id.'/detailArticle') }}">Détails</a>
      </div>
      </div>
      <!-- properties -->
      @endforeach

</div>

</div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
 $('#search').autocomplete({
   source : '{!!URL::route('autocomplete')!!}',
    minlength:1,
    autoFocus:true,
    select:function(e,ui){     
      // $('#Prix').val(ui.item.prix);
      // $('#Libelle').val(ui.item.value);
   }
 });



</script>






@endsection




