@extends('layouts.app')
@section('content')
  
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

		<h1>Your ticket number is:</h1>


		<div class="karta">
					{{ $ticket_number }}						 
		</div>
		<a href="/home">   <button class="myButton" type="submit">Back Home </button></a>
		
	</div>

	@endsection
