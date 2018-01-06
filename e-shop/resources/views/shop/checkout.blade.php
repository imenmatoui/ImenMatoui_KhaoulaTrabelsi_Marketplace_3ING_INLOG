@extends('layouts.master')

@section('content')

	<form action="{{route('article.postCheckout')}}" method="post" id="payment-form">
        {{csrf_field()}}
		<div class="form-row">
			<label for="card-element">
				Credit or debit card
			</label>
			<div id="card-element">
				<!-- a Stripe Element will be inserted here. -->
			</div>

			<!-- Used to display form errors -->
			<div id="card-errors" role="alert"></div>
		</div>
		<br>
		<button class="btn btn-info">Soumettre le paiement</button>
	</form>

@endsection


