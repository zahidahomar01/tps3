
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-2">
                    <div class="col-lg-12 margin tb">
                        <div class="pull-left">
                            <h2>Add Project</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('Project2.index') }}" enctype="multipart/form-data">Back</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>@if (session('status'))
        <div class="alert alert-sucess mb-1 mt-1">
            {{ session ('status')}}
        </div>
        @endif

        <form action="{{ route('Project2.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form group">
                            <strong>Project name:</strong>
                            <input type="text" name="proj_name" class="form-control" placeholder="Project Name">
                            @error('proj_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                
                    <div class="form-group">
                        <strong>PIC Hp:</strong>
                        <input type="text" name="pic_hp" value="{{ $project->$pic->pic_hp}}" class="form-control" placeholder="PIC HP">
                        @error('pic_hp')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <strong>PIC Email:</strong>
                        <input type="email" name="pic_email" value="{{ $project->$pic->pic_email}}" class="form-control" placeholder="PIC Email">
                        @error('pic_email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                </button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
            </form>
</x-app-layout>
