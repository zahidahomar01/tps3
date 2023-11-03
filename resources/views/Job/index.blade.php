<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Project Job Details') }}
        </h2>
    </x-slot>

    <div class="board">
        <a id="btn-addnew" value="Add Job" href="{{ route('Job.create')}}">Add Job</a>
       

            <form action="{{ route('search') }}" method="GET">
                <input type="text" class="block w-10% p-1 pl-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-black dark:border-gray-600 dark:placeholder-gray dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" name="search" placeholder="Search"required/>
                <button id="btn-addnew" type="submit">Search</button>
            </form>

        <h2>{{ $project->proj_name }}</h2>
        @if (!is_null($project->jobs) && count($project->jobs) > 0)
            <table class="w-full text-sm text-center text-black dark:text-black">

                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Remark</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <ul>
                    @foreach ($project->jobs as $job)
                        <tr>
                            <td>{{ $job->job_name }}</td>
                            <td>{{ $job->job_date }}</td>
                            <td>{{ $job->job_remark }}</td>
                            <td>{{ $job->job_status }}</td>

                            <td class="edit">
                                <a href="{{ route('Job.edit', $job->job_id )}}">Edit</a>
                            </td>

                            <td class="delete">
                                <form method="POST" action="{{ route('Job.destroy', $job->job_id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this job?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </ul>
            </table>
        @else
            <p>No jobs found for this project.</p>
        @endif
    </div>
</x-app-layout>


