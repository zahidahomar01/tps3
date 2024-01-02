<link href="/CSS/main.css" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update PIC') }}
        </h2>
    </x-slot>


<div class="wrapper">
    <x-validation-errors class="mb-4" />

    @if ($pic)
        <form method="POST" action="{{route('Admin.Pic.update', $pic->pic_id)}}">
            @csrf  <!--safety purpose-->
            @method('PUT')
            <div>
                <label>Name</label><br>
                <input type="text" name="pic_name" value="{{$pic->pic_name}}" required><br>
            </div>
            
            <div>
                <label>Phone Number<label><br>
                <input type="tel" name="pic_hp" value="{{$pic->pic_hp}}" required><br>
            </div>

            <div>
                <label>Email<label><br>
                <input type="email" name="pic_email" value="{{$pic->pic_email}}" required><br><br>
            </div>
            <input id="btn-addnew" type="submit" value="Update"></input>
        </form>
    @else
        <p>PIC not found</p>
    @endif
</div>
</x-app-layout>