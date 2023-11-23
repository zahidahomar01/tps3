<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List of Projects') }}
        </h2>
    </x-slot>
 
    <div class="board">
        <h1>Project Details</h1>
        <table>
            <tr>
                <p>ID: {{ $project->proj_id }}</p>
                <p>Name: {{ $project->proj_name }}</p>
                <p>Status: {{ $project->proj_status }}</p>
                <p>Date: {{ $project->proj_date }}</p>
            </tr><br>
            <tr>
                <h2>Jobs within this Project</h2>
            </tr>
            @if (!is_null($project->jobs) && count($project->jobs) > 0)
                <ul>
                    @foreach ($project->jobs as $job)
                        <tr>
                            <p> {{ $job->job_id }}</p>
                            <p>Job Name: {{ $job->job_name }}</p>
                            <p>Job Date: {{ $job->job_date }}</p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No jobs found for this project.</p>
            @endif
        </table>
    </div>
</x-app-layout-->
