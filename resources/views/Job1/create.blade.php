<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Job') }}
        </h2>
    </x-slot>

    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
        @endif
    </div>

    <div class="wrapper">
    <form method="POST" action="{{ route('job.store')}}">
        @csrf  <!--safety purpose-->
        @method('POST')
            
        <input type="hidden" name="proj_id" value="{{ $project->proj_id }}">
            <label>Job Name:</label><br>
                <input type="text" name="job_name" placeholder="Job Name" required><br>

            <label>Date:</label><br>
                <input type="date" name="job_date" required>
            <input id="btn-addnew" type="submit" value="Save New Job">
    </div>
</x-app-layout>