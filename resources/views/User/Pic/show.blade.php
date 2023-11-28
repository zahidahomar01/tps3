<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('PIC Project') }}
        </h2>
    </x-slot>
 
    <div class="board">
        <br>
        <h2 class="h2-table">{{ $pic->pic_name }}</h2>
        <br>
        <table> 
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Project</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    
                </tr>
            </thead>
            <tbody>
                @if($pic->projects)
                    @foreach($pic->projects as $project)
                        <tr id="projtb">
                            <td>{{ $project->proj_id }}</td>
                            <td>{{ $project->proj_name }}</td>
                            <td>{{ $project->proj_status }}</td>
                            <td>{{ $project->proj_date }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No projects associated with this PIC.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
