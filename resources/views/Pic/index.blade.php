<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List of PICs') }}
        </h2>
    </x-slot>

    <div class="board">
        <h1>PICs</h1><br>
        <a id="btn-addnew" value="Add PIC" href="{{ route('Pic.create')}}">Add PIC</a>

        <table class="w-full text-sm text-left text-black dark:text-black">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                @foreach($pics as $pic)
                <tr>
                    <td>{{ $pic->pic_id }}</td>
                    <td>{{ $pic->pic_name }}</td>
                    <td>{{ $pic->pic_hp }}</td>
                    <td>{{ $pic->pic_email }}</td>
                    <td class="edit">
                        <a href="{{ route('Pic.edit', $pic->pic_id) }}">Edit</a>
                    </td>
                    <td class="details">
                        <a href="{{ route('Pic.show', $pic->pic_id) }}">Details</a>
                    </td>
                   
                    <td class="badge badge-warning gap-2">
                        <form class="delete" method="POST" action="{{ route('Pic.destroy', $pic->pic_id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this PIC?')">Delete</button>
                        </form>                    
                    </td>

                </tr>
            @endforeach
            </table>
      
    </div>
</x-app-layout>


