<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List of Projects') }}
        </h2>
    </x-slot>
 
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>TPS Department project</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('Project2.create')}}">Add Project</a>
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="3">Project</th>
                <th>PIC</th>
                <th rowspan="3">Status</th>
                <th rowspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($project->items() as $aProject)
            <tr>
                <td>{{  $aProject->proj_name }}</td>
                <td>{{  $aProject->pic->pic_name }}</td>
                <td>{{  $aProject->pic->pic_hp }}</td>
                <td>{{  $aProject->pic->pic_email }}</td>
                <td>
                    <form action="{{ route('Project2.destroy' ,$aProject->proj_id) }}" method="post">
                        <a class="btn btn-primary" href="{{ route('Project2.edit', $aProject->proj_id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   
</div>
</x-app-layout>