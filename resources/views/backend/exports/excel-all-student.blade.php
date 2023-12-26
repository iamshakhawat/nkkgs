<table id="customers">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Student ID</th>
            <th>Class</th>
            <th>Section</th>
            <th>Birth Date</th>
            <th>Roll</th>
            <th>Shift</th>
            <th>Gender</th>
            <th>Religion</th>
            <th>Blood Group</th>
            <th>Nationality</th>
            <th>Father's Name</th>
            <th>Mother's Name</th>
            <th>Parent Email</th>
            <th>Parent Phone</th>
            <th>Emergency Contact</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Current Address</th>
            <th>Parmanent Address</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->user_id }}</td>
                <td>{{ $student->class }}</td>
                <td>{{ $student->section }}</td>
                <td>{{ $student->dob }}</td>
                <td>{{ $student->roll }}</td>
                <td>{{ $student->shift }}</td>
                <td>{{ $student->gender}}</td>
                <td>{{ $student->religion}}</td>
                <td>{{ $student->blood_group}}</td>
                <td>{{ $student->nationality}}</td>
                <td>{{ $student->father_name}}</td>
                <td>{{ $student->mother_name }}</td>
                <td>{{ $student->parent_email }}</td>
                <td>{{ $student->parent_phone }}</td>
                <td>{{ $student->emergency_contact }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->current_address }}</td>
                <td>{{ $student->parmanent_address }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
