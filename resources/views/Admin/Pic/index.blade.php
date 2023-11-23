<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List of PICs') }}
        </h2>
    </x-slot>

    <div class="board">
        
        <br>
        <a id="btn-addnew" value="Add PIC" href="{{ route('Admin.Pic.create')}}">Add PIC</a>
    <div>
        <!--table class="w-full text-sm text-left text-black dark:text-black"-->
        <section class="table-body">
            <table>
                <thead>
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Phone Number</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th  class="px-6 py-3" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pics as $pic)
                <tr>
                    <td>{{ $pic->pic_id }}</td>
                    <td>{{ $pic->pic_name }}</td>
                    <td>{{ $pic->pic_hp }}</td>
                    <td>{{ $pic->pic_email }}</td>
                   
                    <td class="edit">
                        <a href="{{ route('Pic.edit', $pic->pic_id) }}">
                            <svg class="h-5 w-5 text-indigo-500" width="24"  height="24"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />  
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                        </a>
                    </td>

                    <td class="details">
                        <a href="{{ route('Pic.show', $pic->pic_id) }}">
                            <svg class="h-5 w-5 text-indigo-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </a>
                    </td>
                    <td class="delete">
                        <form method="POST" action="{{ route('Pic.destroy', $pic->pic_id) }}">
                            @csrf
                            @method('DELETE')
                                <button type="submit"  onclick="return confirm('Are you sure you want to delete this PIC?')">
                                    <svg class="h-8 w-8 text-red-500"  align-content="center" fill="none" viewBox="0 0 35 35" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </section>
    </div>
      
    </div>
</x-app-layout>

