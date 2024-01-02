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
                    <th scope="col" class="px-6 py-3">No.</th>
                    <th scope="col" class="px-6 py-3">Project</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    
                </tr>
            </thead>
            <tbody>
                @if($pic->projects)
                    @foreach($pic->projects as $project)
                        <tr id="projtb">
                            <td scope="col" class="px-6 py-3">{{ $loop->iteration }}</td>
                            <td scope="col" class="px-6 py-3">{{ $project->proj_name }}</td>
                            <td scope="col" class="px-6 py-3">
                                @if ($project->proj_status==='Complete')
                                        <div class="rounded rounded-full text-green-600 dark:text-green">
                                            {{$project->proj_status}}
                                        </div>
                                    @else 
                                        <div class="rounded rounded-full text-red-600 dark:text-red">
                                            {{$project->proj_status}}
                                        </div>
                                    @endif
                            </td>
                            <td scope="col" class="px-6 py-3">{{ $project->proj_date }}</td>
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
