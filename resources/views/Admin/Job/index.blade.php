<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Project Job Details') }}
        </h2>
    </x-slot>

    <div class="board">
        <a id="btn-addnew" value="Add Job" href="{{ route('Admin.Job.create')}}">Create Job</a>
       

            <form class="form" action="{{ route('search') }}" method="GET">
                <input type="text" class="block w-10% p-1 pl-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-black dark:border-gray-600 dark:placeholder-gray dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" name="search" placeholder="Search"required/>
                <button class="btn-search" type="submit">Search</button>
            </form>
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
                            <th colspan="2" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project->jobs as $job)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $job->job_name }}</td>
                                <td>{{ $job->job_date }}</td>
                                <td>{{ $job->job_remark }}</td>
                                <td>
                                        @if ( $job->job_status ==='Complete')
                                            <div class="rounded rounded-full text-green-600 dark:text-green">
                                                {{$job->job_status}}
                                            </div>
                                        @else 
                                            <div class="rounded rounded-full text-red-600 dark:text-red">
                                                {{ $job->job_status }}
                                            </div>
                                        @endif
                                    </button>

                                </td>
                                
                                <td class="edit">
                                    <div >
                                        <a href="{{ route('Admin.Job.edit', $job->job_id )}}">
                                            <svg class="h-5 w-5 text-indigo-500" width="24"  height="24"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />  
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                    
                                <td class="delete">
                                    <form method="POST" action="{{ route('Admin.Job.destroy', $job->job_id) }}">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this job?')">
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
            @else
                <p>No jobs found for this project.</p>
            @endif
        </div>
</x-app-layout>


