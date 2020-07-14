@extends('layouts.app')
@section('content')

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

 <body>

        <form method="post" action="/change-password">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h1> Change your password<h1/>

              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
                       <label for="psw"><b> Old Password</b></label>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
            <input class="register" type="password" placeholder="Enter Password" name="oldpsw"  required> 
            </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
            <label for="psw"><b> New Password</b></label>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
            <input class="register" type="password" placeholder="Enter Password" name="password" required> 
            </div>
               <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
            <label for="psw"><b> Confirm  new Password</b></label>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
            <input class="register" type="password" placeholder="Enter Password" name="password_confirmation" required> 
            </div>


            <button class="myButton" type="submit">Change password</button>

            <div class="container">
             @if(isset($error_response) || isset($oldpassword_error))
                         <h4>Errors:</h4>
                         <ul>
             		@if(isset($error_response))
                  		@foreach($error_response as $error)
                  
                    		<li> {{ $error }}</li>
                  
                  		@endforeach
              		@endif
              		
	                  @if(isset($oldpassword_error))
	                  
	                    <li>{{ $oldpassword_error }}</li>


	                  @endif
                  </ul>
             @endif
  </div>
</div>

@endsection