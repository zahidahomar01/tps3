<link href="/CSS/main.css" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit PIC') }}
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
    @if ($pic)
        <form method="POST" action="{{route('Admin.Pic.update', $pic->pic_id)}}">
            @csrf  <!--safety purpose-->
            @method('PUT')
            <div>
                <label>Name</label><br>
                <input type="text" name="pic_name" value="{{$pic->pic_name}}"><br>
            </div>
            
            <div>
                <label>Phone Number<label><br>
                <input type="tel" name="pic_hp" value="{{$pic->pic_hp}}"><br>
            </div>

            <div>
                <label>Email<label><br>
                <input type="email" name="pic_email" value="{{$pic->pic_email}}"><br><br>
            </div>
            <input id="btn-addnew" type="submit" value="Add PIC"></input>
        
      
    </form>
        @else
            <p>PIC not found</p>
        @endif
</div>
</x-app-layout>