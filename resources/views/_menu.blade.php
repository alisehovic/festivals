


<div class="header">
        	<ul class="lista">
                <li><a href="/home">Home</a></li>
                    @if($user->role==App\Enums\UserEnum::admin)
                <li><a href="/admin/add-festival">Add Festival</a></li>
                <li><a href="/admin/users">Users</a></li>
                    @endif         
                <li class="logout"><a href="/logout">Logout</a></li>
                <li class="logout"><a href=""> {{$user->email}} </a></li>
                <li class="logout"><a href="/change-password"> Change password</a></li>
            </ul>
</div>