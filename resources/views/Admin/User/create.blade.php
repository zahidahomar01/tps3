<link href="/CSS/main.css" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>


<div class="wrapper">
    
    <x-validation-errors class="mb-4" />

    <form action="{{ route('Admin.User.store')}}" method="POST" >
        @csrf  <!--safety purpose-->
        @method('POST')

            <label>Name</label><br>
            <input type="text" name="name" required><br>
   
            <label>password<label><br>
            <input type="password" name="password" required><br><br>

            <label>Email<label><br>
            <input type="email" name="email" required><br>
            <div>
                <label>Role</label><br>
                    <select name="role" required>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
            </div>
            <br>
            <input id="btn-addnew" type="submit" value="Add User"></input>
      
    </form>
</div>
<div></div>
</x-app-layout>