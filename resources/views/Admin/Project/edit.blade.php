<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Update Project') }}
        </h2>
    </x-slot>

    <div class="wrapper">
        <x-validation-errors class="mb-4" />

        @if ($project)
        <form method="POST" action="{{route('Admin.Project.update', $project->proj_id)}}">
            @csrf  <!--safety purpose-->
            @method('PUT')
            <div>
                <label>Project Name</label><br>
                <input type="text" name="proj_name" value="{{$project->proj_name}}"required>
            </div>

            <div>
                <label>Status<label><br>
                    <select name="proj_status" value="{{$project->proj_status}}" required>
                        <option value="In process"  {{ $project->proj_status === 'In process' ? 'selected' : '' }}>In process</option>
                        <option value="Complete"  {{ $project->proj_status === 'Complete' ? 'selected' : '' }}> Complete</option>
                    </select>
                    <br><br>
            </div>

            <div>
                <label>PIC</label><br>
                    <select name="pic_id" required>
                        <option></option>
                        @foreach ($pics as $pic)
                            <option value="{{ $pic->pic_id }}" 
                                @if($project->pic_id == $pic->pic_id) selected @endif>
                                {{ $pic->pic_name }}
                            </option>
                        @endforeach
                    </select>
                    <br><br>
            </div>
    
            <div>
                <label>Project Date</label><br>
                <input type="date" name="proj_date"   value="{{$project->proj_date}}">
            </div>

                <button id="btn-addnew" type="submit">Update</button>
            </div>
        </form>
        @else
            <p>Project Not found</p>
        @endif
    </div>
 
</x-app-layout>