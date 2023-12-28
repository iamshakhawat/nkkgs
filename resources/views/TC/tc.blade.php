@extends('backend.inc.main')
@section('title', 'All TC Request')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">TC</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {{-- <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20px">#</th>
                                <th style="width:200px">Name (Subject)</th>
                                <th style="width:100px">Teacher ID</th>
                                <th>Gender</th>
                                <th style="width:120px">Date of Birth</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th style="width:120px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <div class="d-flex ">
                                            @if ($teacher->photo == '')
                                                <img class="rounded-circle mr-2" height="30" width="30"
                                                    src="{{ asset('backend') }}/assets/img/user.jpg" alt="Card image">
                                            @else
                                                <img class="rounded-circle  mr-2" height="30" width="30"
                                                    src="{{ asset('upload') }}/users/{{ $teacher->photo }}"
                                                    alt="Card image">
                                            @endif
                                            <div class="">
                                                <h2 class="mb-0"><a
                                                        href="{{ route('admin.profile.teacher', ['id' => $teacher->id]) }}">{{ $teacher->name }}</a>
                                                </h2>
                                                <small>({{ $teacher->subject }})</small>
                                            </div>
                                        </div>

                                    </td>
                                    <td>{{ $teacher->user_id }}</td>
                                    <td>{{ $teacher->gender }}</td>
                                    <td>{{ $teacher->dob }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->phone }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('admin.edit.teacher', ['id' => $teacher->id]) }}"><i
                                                class=" fa fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger" onclick="$('#user_id').val({{ $teacher->id }})"
                                            data-toggle="modal" data-target="#delete_employee"><i
                                                class="fas fa-trash-alt m-r-5"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                </div>

            </div>
            <div class="d-flex justify-content-center mt-3">
                {{-- {{ $teachers->appends($_GET)->links('pagination::bootstrap-4') }} --}}
            </div>
        </div>

        <div id="delete_employee" class="modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-md">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                    </div>
                    <form action="{{ route('admin.delete.teacher') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <p>Are you sure want to delete this?</p>
                            <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                <input type="hidden" id="user_id" name="user_id">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
