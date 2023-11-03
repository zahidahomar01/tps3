

<div>
    <table>
            <tr>
                <th>Client Name<th>
                <th>PIC</th>
                <th>Current Status</th>
                <th >Date</th>
                <th>Action</th>
            </tr>
            @foreach ($this as $$projects)
            <tr>
                <td rowspan="3">{{$project->proj_name}}</td>
                <td>{{ $project->pic->pic_name }}</td>
                <td>{{ $project->pic->pic_hp }}</td>
                <td>{{ $project->pic->pic_email }}</td>
                <td>{{ $project->proj_status }}</td>
                <td>
                    <a href='Project.list-proj'>Details</a>
                </td>
            </tr>
            @endforeach

            </tr>
    </table>

</div>
