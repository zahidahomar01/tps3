<link href="/CSS/main.css" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List of Projects') }}
        </h2>
    </x-slot>
 
    <div class="board">
    <br>
        <div>
            <!--table class="w-full text-sm text-center text-black dark:text-black"-->
            <section class="table-body">
                <table> 
                    <thead>
                        <tr >
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Project</th>
                            <th scope="col" class="px-6 py-3">PIC</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col"  class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr id="projtb">
                                <td>{{ $project->proj_id }}</td>
                                <td>{{ $project->proj_name }}</td>
                                <td>
                                    @if ($project->pic)
                                        <ul>
                                                <li class="w-full text-sm text-center text-black dark:text-black">
                                                <strong>Name:</strong> {{ $project->pic->pic_name }}<br>
                                                <strong>No.phone:</strong> {{ $project->pic->pic_hp }}<br>
                                                <strong>Email:</strong> {{ $project->pic->pic_email }}<br><br>

                                                </li>
                                        </ul>
                                    @else
                                        No PIC assigned.
                                    @endif
                                </td>
                                <td>{{ $project->proj_status }}</td>
                                <td>{{ $project->proj_date }}</td>
            
                                <td scope="col"  class="px-6 py-3" class="details">
                                    <a href="{{ route('User.Job.index', ['project' => $project->proj_id]) }}">
                                        <svg class="h-5 w-5 text-indigo-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </a>
                                </td>
                               
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </section>
</div>

</div>
    </div>


</x-app-layout>
                        