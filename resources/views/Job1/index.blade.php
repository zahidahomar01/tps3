<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List of Job') }}
        </h2>
    </x-slot>

    <div class="board">
       
        <button id="btn-addnew"><a  href="{{route('job.create')}}">{{ __('Create jobs') }}</a></button><br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th colspan="2">Job Name</th>
                    <th>Date</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($job as $aJob)
                    <tr>
                        <td>{{$aJob->job_id}}</td>
                        <td colspan="2">{{$aJob->job_name}}</td>
                        <td>{{$aJob->job_date}}</td>
                        <td colspan="3">
                            <a href="{{ route('job.edit',['job'=>$aJob->job_id]) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>