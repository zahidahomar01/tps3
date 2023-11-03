<link href="/CSS/main.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Search Results') }}
        </h2>
    </x-slot>

    <div class="board">
        <h1>Search Results</h1>
<br>
            <form action="{{ route('search') }}" method="GET">
                <input type="text" class="block w-10% p-1 pl-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-black dark:border-gray-600 dark:placeholder-gray dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" name="search" placeholder="Search"required/>
                <button id="btn-addnew" type="submit">Search</button>
            </form>

    <br>


        @if($job->isNotEmpty())
            <table class="w-full text-sm text-center text-black dark:text-black">
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Remark</th>
                    <th>Status</th>
                </tr>
                @foreach ($job as $result)
                    <tr>
                        <td>{{ $result->job_name }}</td>
                        <td>{{ $result->job_date }}</td>
                        <td>{{ $result->job_remark }}</td>
                        <td>{{ $result->job_status }}</td>
                    </tr>
                @endforeach
            </table>
        @else 
            <div>
                <h2>No jobs found</h2>
            </div>
        @endif
    </div>
</x-app-layout>
