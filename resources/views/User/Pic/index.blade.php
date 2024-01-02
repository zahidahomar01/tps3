<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List of PICs') }}
        </h2>
    </x-slot>

    <div class="board">
    <div>
        <!--table class="w-full text-sm text-left text-black dark:text-black"-->
        <section class="table-body">
            <br>
            <table>
                <thead>
                <tr>
                    <th scope="col" class="px-6 py-3">No.</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Phone Number</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th  class="px-6 py-3" colspan="3">Action</th>
                </tr>
                </thead>
                
                <tbody>
                    @foreach($pics as $pic)
                    <tr>
                        <td scope="col" class="px-6 py-3">{{ $loop->iteration }}</td>
                        <td scope="col" class="px-6 py-3">{{ $pic->pic_name }}</td>
                        <td scope="col" class="px-6 py-3">{{ $pic->pic_hp }}</td>
                        <td scope="col" class="px-6 py-3">{{ $pic->pic_email }}</td>
                    
                        <td class="details" scope="col" class="px-6 py-3">
                            <a href="{{ route('User.Pic.show', $pic->pic_id) }}">
                                <svg class="h-5 w-5 text-indigo-500 items-center justify-center"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </a>
                        </td>
                    
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
      
    </div>
</x-app-layout>


