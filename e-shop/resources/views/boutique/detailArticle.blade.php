@extends('layouts.app')

@section('content')


<!-- banner -->
<div class="inside-banner">
<div class="container"> 
  <span class="pull-right"><a href="{{ url('boutique/'.$arts->boutique_id.'/show') }}">Article </a></span>
  <h2>Article</h2>
</div>
</div>
<!-- banner -->

<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">


</div>

<div class="col-lg-9 col-sm-8 ">


<h2> {{$arts->Libelle}}  </h2>



<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
      </ol>
      <div class="carousel-inner">
        <!-- Item 1 -->
        <div class="item active">
          <img src="{{ asset($arts->photo) }}" class="properties" alt="properties" />
        </div>
        <!-- #Item 1 -->

      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>




  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Propriétées</h4>
  <p> {{$arts->Description}}   </p>

  </div>


  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price">$ {{$arts->Prix}} </p>

  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Informations vendeur
  <p>John Parker<br>009 229 2929</p>
  </div>
</div>

    <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>

    <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>

</div>

  </div>
</div>
</div>
</div>
</div>
</div>





@endsection




