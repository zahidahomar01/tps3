<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List of Projects') }}
        </h2>
    </x-slot>
 
 <div class="board">
    <button id="btn-addnew"><a  href="{{ route('project.create') }}">{{ __('Create Projects') }}</a></button>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th colspan="2">Project Name</th>
                <th colspan="4">Status</th>
                <th colspan="6">Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach($project as $aProject)
            <tr>
                <td>{{$aProject->proj_id}}</td>
                <td colspan="2">{{$aProject->proj_name}}</td>
                <td colspan="4">{{$aProject->proj_status}}</td>
                <td class='details'>
                <a href="{{ route('job.show', ['job' => $aProject->proj_id]) }}">Details</a>
                </td>
                <td class='edit'>
                    <a href="{{ route('project.create',['job'=>$aProject->proj_id]) }}">Edit</a>
                </td>
                <td class='delete'>
                    <a href="">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
 </div>
</x-app-layout>