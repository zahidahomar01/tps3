<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Update Job') }}
        </h2>
    </x-slot>
 
    <div class="wrapper">
    
    <x-validation-errors class="mb-4" />
    
    <form method="POST" action="{{ route('Admin.Job.update', ['job' => $job->job_id, 'proj_id' => $job->proj_id]) }}">
        @csrf  <!--safety purpose-->
        @method('PUT')
        <div>
            <label>Job Name</label><br>
            <input type="text" name="job_name" value="{{$job->job_name}}"placeholder="Job Name" required>
        </div>

        <div>
            <label>Job Date</label><br>
            <input type="date" name="job_date" value="{{$job->job_date}}" placeholder="Job Date" required>
        </div>

          <div>
                <label> Status<label><br>
                    <select name="job_status" value="{{$job->job_status}}" required>
                        <option value="In process"  {{ $job->job_status === 'In process' ? 'selected' : '' }}>In process</option>
                        <option value="Complete"  {{ $job->job_status === 'Complete' ? 'selected' : '' }}> Complete</option>
                    </select>
                    <br><br>
            </div>

        <div>
            <label>Remark</label><br>
            <input type="text" name="job_remark" value="{{$job->job_remark}}" placeholder="Job Remark">
        </div>

        <div>
            <input id="btn-addnew" type="submit" value="Update" />
        </div>
    </form>
</div>
 
</x-app-layout>