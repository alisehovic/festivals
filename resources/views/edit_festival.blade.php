@extends('layouts.app')
@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

  <body>
		 <form method="post" action="/admin/edit_festival/{{$festival->id}}">
		        <h2>Edit festival</h2>

			  <div class="container">
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
				  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
				    	<label for="name"><b>Name of the festival</b></label>
			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
			    		<input class="login" type="text" value="{{$festival->name}}"  placeholder="Enter name of the festival" name="name" > 
			  		</div>
			  		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
				  		<label for="organisator"><b>Organisator</b></label>
			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
 						 <input class="login" type="text" value="{{$festival->organisator}}"placeholder="Enter name and surname of the organisator" name="organisator" > 		  		
 					</div>

			  	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
				  		 <label for="date"><b>Date</b></label>

			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
				  		<input class="login" type="date" value="{{$festival->date}}" placeholder="Enter date" name="date" required> 
			  		</div>	

			  		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
				    <label for="url"><b>Website</b></label>

			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
 					<input class="login" type="text" value="{{$festival->url}}" placeholder="Enter url" name="url" required> 
 					</div>	  
 					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
				    <label for="longitude"><b>Longitude</b></label>

			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
			    	<input class="login" type="double"  value="{{$festival->longitude}}" placeholder="Enter longitude" name="longitude" required> 
			  		</div>

			  		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
				    <label for="latitude"><b>Latitude</b></label>

			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
			    	<input class="login" type="double"  value="{{$festival->latitude}}"placeholder="Enter latitude" name="latitude" required>  
			  		</div>

			  		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
				    <label for="address"><b>Address</b></label>

			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
				    <input class="login" type="text" value="{{$festival->address}}" placeholder="Enter Address" name="address" required>  
			  		</div>

			  		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
				    <label for="price"><b>Price</b></label>

			  		</div>
				  	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
						<input class="login" type="text" value="{{$festival->price}}" placeholder="Enter ticket price" name="price" required>
			  		</div>
			    
			   
			   
			   
			    

			    <button class="myButton" type="submit">Submit</button>

			</div>
		</form>
</body>

</div>



@endsection