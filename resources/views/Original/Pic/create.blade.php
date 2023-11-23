<link href="/CSS/main.css" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create PIC') }}
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
    <form action="{{ route('Pic.store')}}" method="POST" >
        @csrf  <!--safety purpose-->
        @method('POST')

            <label>Name</label><br>
            <input type="text" name="pic_name"><br>
   
            <label>Phone Number<label><br>
            <input type="tel" name="pic_hp"><br>

            <label>Email<label><br>
            <input type="email" name="pic_email"><br><br>

            <input id="btn-addnew" type="submit" value="Add PIC"></input>
      
    </form>
</div>
<div></div>
</x-app-layout>