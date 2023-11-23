<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Job') }}
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
  
    <form method="POST" action="{{ route('Job.store')}}">
        @csrf  <!--safety purpose-->

        <div class="form-group">
            <label>Job Name</label><br>
            <input type="text" name="job_name">
        </div>

        <div class="form-group">
            <label>Date</label><br>
            <input type="date" name="job_date"><br> <br>
        </div>

        <div class="form-group">
            <label>Status<label><br>
                    <select name="job_status" >
                        <option value="In process">In process</option>
                        <option value="Complete">Complete</option>
                    </select>

                <br>
            <br> <br>
        </div>

        <div class="form-group">
            <label>Remark</label><br>
            <input type="text" name="job_remark"><br> <br>
        </div>

        <div class="form-group">
            <label for="proj_id">Project</label><br>
            <select name="proj_id" id="proj_id" required>
                @foreach($project as $aProject)
                    <option value="{{ $aProject->proj_id }}">{{ $aProject->proj_name }}</option>
                @endforeach
            </select>
        </div><br>
            <input id="btn-addnew" type="submit">
      
  </form>
</x-app-layout>
    