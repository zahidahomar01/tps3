<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Projects') }}
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
    <form method="POST" action="">
        @csrf  <!--safety purpose-->
        @method('POST')
        <div>
            <label>Project Name</label>
            <input type="text" name="proj_name" placeholder="Project Name" value="{{$project->proj_name}}">
        </div>
        <!--div>
            <label>PIC</label><br>
            <input type="text" name="picName" placeholder="PIC Name"><br>
            <input type="email" name="picEmail" placeholder="PIC Email"><br>
            <input type="number" name="picHP" placeholder="PIC Hp"><br>
        </div-->
        <div>
            <label>Project Status</label>
            <input type="text" name="proj_status" placeholder="Project Status" value="{{$project->proj_status}}">
        </div>
        

        <div>
            <input type="submit" value="Update Project"/>
        </div>
    </form>
 
</x-app-layout>