<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Projects') }}
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
    <form method="POST" action="{{ route('project.store')}}">
        @csrf  <!--safety purpose-->
        @method('POST')

            <label>Project Name</label><br>
            <input type="text" name="proj_name" placeholder="Project Name">
   
            <label>Project Status<label><br>
                <select name="proj_status" >
                    <option value="In process">In process</option>
                    <option value="Complete"> Complete</option>
                </select>

                <br><br>

            <label>Date</label><br>
            <input type="date" name="dateTime" placeholder="Date"><br> <br>
            <input id="btn-addnew" type="submit" value="Update project"></button>
      
    </form>
</div>
 
</x-app-layout>