<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center">
        <div class="x">
            <h4>Student Details</h4>
            <table class="table  table-bordered w-100">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Shift</th>
                    </tr>
                    <tr>
                        <td>{{ $student->user_id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->roll }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->section }}</td>
                        <td>{{ $student->shift }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="my-2">
            <i class="fa fa-link "></i>
        </div>
        <div class="x">
            <h4>Parent Details</h4>
            <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Blood</th>
                    </tr>
                    <tr>
                        <td>{{ $parent->name }}</td>
                        <td><a href="tel:{{ $parent->phone }}">{{ $parent->phone }}</a></td>
                        <th><a href="mailto:{{ $parent->email }}">{{ $parent->email }}</a></th>
                        <td>{{ $parent->blood_group }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>