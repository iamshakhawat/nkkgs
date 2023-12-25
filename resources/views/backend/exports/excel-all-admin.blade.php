    <table>
        <tr>
            <th>SI</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Role</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Blood Group</th>
            <th>Admin Since</th>
            <th>Present Address</th>
            <th>Parmanent Address</th>
        </tr>
        @foreach ($admins as $admin)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $admin->user_id }}</td>
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
