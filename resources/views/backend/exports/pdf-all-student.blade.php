<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        td,
        th {
            font-size: 11px;
            text-align: center !important;
        }

        table {
            width: 95%;
            margin: 0 auto;
        }

        .rounded-circle {
            border-radius: 50%;
        }
        .info{
            width: 70%;
        }
    </style>
    <title>All Student Data</title>
</head>

<body>

    <h1 style="text-align: center;margin-bottom:20px">All Student Data</h1>
    <table id="customers">
        <thead>
            <tr>
                <th>#</th>
                <th style="width: 80px !important">Photo</th>
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
                    <td>
                        <div>
                            @if ($student->photo == '')
                                <img class="rounded-circle" height="50" 
                                    src="{{ public_path('/') }}/backend/assets/img/user.jpg" alt="Card image">
                            @else
                                <img class="rounded-circle " height="50"
                                    src="{{ public_path('/') }}/upload/users/{{ $student->photo }}" alt="Card image">
                            @endif
                        </div>
                    </td>
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

</body>

</html>
