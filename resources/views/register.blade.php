@extends('layouts.app')
@section('content')


<!doctype html>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

    <body>
 <form method="post" action="/register">
        <h2>Register Form</h2>

  <div class="container">
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <label for="email"><b>Email</b></label>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
            <input class="login" type="text" placeholder="Enter email" name="email" > 
    </div>

    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
              <label for="psw"><b>Password</b></label>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
          <input class="login" type="password" placeholder="Enter Password" name="password" > 

    </div>


    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right labelDiv">
        <label for="psw"><b> Confirm Password</b></label>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
          <input class="login" type="password" placeholder="Enter Password" name="password_confirmation" >
    </div>
  	
   


    <button class="myButton" type="submit">Register</button>

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
</html>
</div>