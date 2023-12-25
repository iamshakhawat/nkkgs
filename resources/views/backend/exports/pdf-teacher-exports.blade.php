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
        .rounded-circle{
            width: 30%;
        }
        .info{
            width: 70%;
        }
    </style>
    <title>All Admin Data</title>
</head>

<body>

    <h1 style="text-align: center;margin-bottom:20px">All Teacher Data</h1>
    <table id="customers">
        <thead>
            <tr>
                <th>#</th>
                <th style="width: 80px">Photo</th>
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
                        <div>
                            @if ($teacher->photo == '')
                                <img class="rounded-circle" height="30" width="50"
                                    src="{{ public_path('/') }}/backend/assets/img/user.jpg" alt="Card image">
                            @else
                                <img class="rounded-circle " height="30" width="50"
                                    src="{{ public_path('/') }}/upload/users/{{ $teacher->photo }}" alt="Card image">
                            @endif
                        </div>
                        </div>
                    </td>
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

</body>

</html>
