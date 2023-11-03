<link href="/CSS/main.css" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List of Projects') }}
        </h2>
    </x-slot>
 
    <div class="board">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        
        <a id="btn-addnew" href="{{route ('Pic.create')}}">Add PIC</a>
        <a id="btn-addnew" href="{{route ('Project.create')}}">Add Projects</a>
        <div class="table-responsive">
            <table class="w-full text-sm text-center text-black dark:text-black">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Project</th>
                        <th scope="col" class="px-6 py-3">PIC</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Date</th>
                        <th scope="col" class="px-6 py-3">Action</th>
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
                       
                        <td class="edit">
                            <a href="{{ route('Project.edit', $project->proj_id) }}">Edit</a>
                        </td>
                        <td class="details">
                            <a href="{{ route('Job.index', ['project' => $project->proj_id]) }}">Details</a>
                        </td>
                        <td class="delete">
                            <form method="POST" action="{{ route('Project.destroy', $project->proj_id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="label label-warning" type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

        </tbody>
    </table>
</div>
    </div>


</x-app-layout>
                        