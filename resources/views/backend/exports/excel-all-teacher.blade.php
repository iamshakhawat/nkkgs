<table id="customers">
    <thead>
        <tr>
            <th>#</th>
            <th>Name (Subject)</th>
            <th>Teacher ID</th>
            <th>Gender</th>
            <th>Blood Group</th>
            <th style="width: 80px">Date of Birth</th>
            <th>Nationality</th>
            <th>Email</th>
            <th>Mobile</th>
            <th style="width: 80px">Joining Date</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>
                    <div class="info">
                        <p style="margin-bottom:0 ">{{ $teacher->name }}</p>
                        <small>({{ $teacher->subject }})</small>
                    </div>
                </td>
                <td>{{ $teacher->user_id }}</td>
                <td>{{ $teacher->gender }}</td>
                <td>{{ $teacher->blood_group }}</td>
                <td>{{ $teacher->dob }}</td>
                <td>{{ $teacher->nationality }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->phone }}</td>
                <td>{{ $teacher->joining_date }}</td>
                <td>{{ $teacher->current_address }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
