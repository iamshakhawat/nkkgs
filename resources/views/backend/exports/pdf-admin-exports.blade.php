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
        td,th{
            font-size: 10px;
        }
        table{
            width: 95%;
            margin: 0 auto;
        }
        .rounded-circle{
            border-radius: 50%;
        }
    </style>
    <title>All Admin Data</title>
</head>

<body>

    <h1 style="text-align: center;margin-bottom:20px">All Admin Data</h1>
    <table id="customers">
        <tr>
            <th>SI</th>
            <th>User ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Role</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Blood Group</th>
            <th>Admin Since</th>
            <th>Parmanent Address</th>
            <th>Present Address</th>
        </tr>
        @foreach ($admins as $admin)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $admin->user_id }}</td>
                <td>
                @if ($admin->photo != '')
                    <img class="rounded-circle" src="{{ public_path('/') }}/upload/users/{{ $admin->photo }}"
                        width="30" height="30">
                @else
                        <img class="rounded-circle" src="{{ public_path('/') }}/backend/assets/img/user.jpg" width="30" height="30">
                @endif
                </td>
                <td>{{ $admin->fname.' '.$admin->lname }}</td>
                <td>{{ $admin->role }}</td>
                <td>{{ $admin->phone }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->gender }}</td>
                <td>{{ $admin->blood_group }}</td>
                <td>{{ $admin->joining_date }}</td>
                <td>{{ $admin->current_address }}</td>
                <td>{{ $admin->parmanent_address }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
