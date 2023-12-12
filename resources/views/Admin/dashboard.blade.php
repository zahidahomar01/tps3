<link href="/CSS/main.css" rel="stylesheet">
<link href="/CSS/style.css" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        
     
            <table>
                <tr>
                    <td>
                        <br>

                            <div class="skill">
                                <div class="outer">
                        
                                    <div class="inner">
                                        <div id="number">
                                             Total User 
                                            <h5>{{ $user }}</h5>
                                            <a href="">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                    <br>
                    <td>
                        <br>
                            <div class="skill">
                                <div class="outer">
                                    <div class="inner">
                                        <div id="number">
                                            Total PIC
                                            <h5>{{ $pic }}</h5>
                                            <a href="{{ route('Admin.Pic.index') }}">View Details</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                   
                    <td> 
                        <br>
                            <div class="skill">
                                <div class="outer">
                                    <div class="inner">
                                        <div id="number">
                                            Total Project
                                            <h5>{{ $project }}</h5>
                                            <a href="{{ route('Admin.Project.index') }}">View Details</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                    
                    <td>
                        <br>
                            <div class="skill">
                                <div class="outer">
                                    <div class="inner">
                                        <div id="number">
                                            Total Job
                                            <h5>{{ $job }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
              
                    <td>
                        <br>
                            <div class="skill">
                                <div class="outer">
                                    <div class="inner">
                                        <div id="number">
                                            Total Completed Job
                                            <h5>{{ $totalCompletedJobs }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                </tr>
            </table>
        <div>
    </div>


</x-app-layout>
