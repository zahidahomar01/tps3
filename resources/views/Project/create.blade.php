<link href="/CSS/main.css" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Project') }}
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
    <form action="{{ route('Project.store')}}" method="POST" >
        @csrf  <!--safety purpose-->
        @method('POST')

                <label>Project Name</label><br>
                <input type="text" name="proj_name" placeholder="Project Name"><br><br>
    
                <label>Project Status<label><br>
                    <select name="proj_status" >
                        <option value="In process">In process</option>
                        <option value="Complete"> Complete</option>
                    </select>
            <div><br>
                <label>PIC<label><br>
                    <select name="pic_id">
                        @foreach ($pic as $pics)
                            <option></option>
                            <option value="{{ ($pics->pic_id) }}">{{ $pics->pic_name }}</option>
                        @endforeach
                    </select>
                    <br>
            </div>
<br>

            <label>Date</label><br>
            <input type="date" name="proj_date" placeholder="Date"><br> <br>
            <input id="btn-addnew" type="submit" value="Add project"></input>
      
    </form>
</div>
</x-app-layout>