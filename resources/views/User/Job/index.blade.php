<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Project Job Details') }}
        </h2>
    </x-slot>

    <div class="board">
      
        <br>
            <h2 class="h2-table">{{ $project->proj_name }}</h2>
            @if (!is_null($project->jobs) && count($project->jobs) > 0)
                <section class="table-body">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3">No.</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Date</th>
                                <th scope="col" class="px-6 py-3">Remark</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project->jobs as $job)
                                <tr>
                                    <td scope="col" class="px-6 py-3">{{ $loop->iteration }}</td>
                                    <td scope="col" class="px-6 py-3">{{ $job->job_name }}</td>
                                    <td scope="col" class="px-6 py-3">{{ $job->job_date }}</td>
                                    <td scope="col" class="px-6 py-3">{{ $job->job_remark }}</td>
                                    <td scope="col" class="px-6 py-3">
                                        @if ( $job->job_status ==='Complete')
                                            <div class="rounded rounded-full text-green-600 dark:text-green">
                                                {{$job->job_status}}
                                            </div>
                                        @else 
                                            <div class="rounded rounded-full text-red-600 dark:text-red">
                                                {{ $job->job_status }}
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                </section>
            @else
                <p>No jobs found for this project.</p>
            @endif
        </div>
</x-app-layout>


