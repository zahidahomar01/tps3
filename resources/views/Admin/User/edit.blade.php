<link href="/CSS/main.css" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
        @endif
    </div>

<div class="wrapper">
    @if ($user)
        <form method="POST" action="{{route('Admin.User.update', $user->id)}}">
            @csrf  <!--safety purpose-->
            @method('PUT')
            <div>
                <label>Name</label><br>
                <input type="text" name="name" value="{{$user->name}}"><br>
            </div>
            
            <div>
                <label>Email<label><br>
                <input type="email" name="email" value="{{$user->email}}"><br><br>
            </div>

            <div>
                <label>Role<label><br>
                <select name="role">
                    <option value="0" @if($user->role == 0) selected @endif>User</option>
                    <option value="1" @if($user->role == 1) selected @endif>Admin</option>
                </select><br><br>
            </div>

            <input id="btn-addnew" type="submit" value="Add User"></input>
        
      
    </form>
        @else
            <p>User not found</p>
        @endif
</div>
</x-app-layout>