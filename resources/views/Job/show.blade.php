
<link href="/CSS/main.css" rel="stylesheet">


<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List of Jobs') }}
        </h2>
    </x-slot>

    <div class="board">
        <h1>List of Jobs</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project->jobs as $job)
                        <tr>
                            <td>{{ $job->job_id }}</td>
                            <td>{{ $job->job_name }}</td>
                            <td>{{ $job->job_date }}</td>
                            <td class="delete">
                                <a href="">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</x-app-layout>
