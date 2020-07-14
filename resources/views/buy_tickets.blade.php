@extends('layouts.app')
@section('content')

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

  <body>
		 <form method="post" action="/buy-tickets/{{$festival_id}}">
		        <h2>Buy Ticket</h2>
		        <h3>  {{$festival->name }} </h3>
		        <h3>  {{$festival->date }} </h3>
		        <h3>  {{$festival->price }}KM </h3>

			  <div class="container">
			  	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
				  		 	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			    			<label for="name"><b>Name</b></label>
			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
			    	 <input class="login" type="text" placeholder="Enter your name" name="name" > 
			  		</div>

			  		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
			    			<label for="name"><b>Surname</b></label>
			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
			    <input class="login" type="text" placeholder="Enter your surname " name="surname" > 
			  		</div>
			  		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
			    			<label for="address"><b>Address</b></label>
			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
						<input class="login" type="text" placeholder="Enter address" name="address" required>			  		
					</div>
					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
			    			<label for="card_number"><b>Card Number</b></label>
			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
						<input class="login" type="string" placeholder="Enter your card number" name="card_number" required> 					
					</div>
					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
			     			<label for="CVC"><b>CVC</b></label>
			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
   						<input class="login" type="string" placeholder="Enter your CVC" name="CVC" required>					
   					</div>
   					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
			    		<label for="quantity">Quantity:</label>
			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
						<input class='login' type="number" placeholder="Number of ticket needed" id="quantity" name="quantity" min="1" max="10">
   					</div>
		    

			    <button class="myButton" type="submit">Buy</button>

			</div>
			 <div class="container">
			     @if(isset($error_response))
			                 <h4>Errors:</h4>
			                 <ul>
			          @foreach($error_response as $error)
			          
			            <li> {{ $error }}</li>
			            
			          
			           


			          @endforeach
			          </ul>
			     @endif
 			 </div>
		</form>
</body>
</div>


@endsection