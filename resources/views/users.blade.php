@extends('layouts.app')
@section('content')


  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
	<h2>Users table</h2>
       <table style="width:100%;  ">

              <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Email</th> 
                <th class="text-center">Role</th>
              </tr>

              @foreach($users as $user)

                <tr style="height: 50px">
                    <td>
                     {{$user->id }}
                     </td>
                    <td>
                    {{$user->email }}
                    </td>
                  
                    <td>
                      @if ($user->role == 1) 
                       User                    
                      @else 
                      Admin
                    
                      @endif

                    </td>
                       <td>
                        	
                     @if ($user->role==1)
                         <a href="/admin/users/delete/{{$user->id}}" class="myButton btn btn-danger">Delete</a>
                     @endif
                        </td>
                </tr>
                @endforeach

 </div>


@endsection