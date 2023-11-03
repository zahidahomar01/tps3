<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Job') }}
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
    <form method="POST" action="{{ route('job.update', ['$job' -> job_id])}}">
        @csrf  <!--safety purpose-->
        @method('put')
            
            <label>Job Name:</label><br>
                <input type="text" name="job_name" value="{{$job->job_name}}" placeholder="Job Name"><br>

            <label>Date:</label><br>
                <input type="date" name="job_date" value="{{$job->job_date}}">
            <input id="btn-addnew" type="submit" value="Update">
    </div>
</x-app-layout>