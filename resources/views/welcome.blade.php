@extends('layouts.app')
@section('content')


<form method="post" action="/login">
        <h2>Login Form</h2>

  <div class="container">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <label for="uname"><b>Username</b></label>
    <input class="login" type="text" placeholder="Enter Username" name="email" required> <br />
    <label for="psw"><b>Password</b></label>
    <input class="login" type="password" placeholder="Enter Password" name="password" required> <br />
        
    <button class="myButton" type="submit" >Login</button>
  </div>

  <div class="container" >
         <a href="/register" class="myButton">Register</a> 

  </div>
</form>









@endsection