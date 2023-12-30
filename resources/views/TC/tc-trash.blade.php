@extends('backend.inc.main')
@section('title', 'All TC Request')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row justify-content-between">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">TC Trash</h5>
                    </div>
                    <a href="{{ route('admin.tc') }}" class="btn btn-info text-white"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20px">#</th>
                                <th style="width:80px">Photo</th>
                                <th style="width:200px">Name</th>
                                <th>Roll</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Shift</th>
                                <th>Student ID</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tcs as $tc)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img class=" rounded-circle" height="50" width="50" src="@if ($tc->photo != "")
                                        {{ asset('upload') }}/users/{{ $tc->photo }}
                                        @else
                                        {{ asset('backend') }}/assets/img/user.jpg
                                    @endif"
                                        alt=""></td>
                                    <td>{{ $tc->name }}</td>
                                    <td>{{ $tc->roll }}</td>
                                    <td>{{ $tc->class }}</td>
                                    <td>{{ $tc->section }}</td>
                                    <td>{{ $tc->shift }}</td>
                                    <td>{{ $tc->user_id }}</td>
                                    <td>
                                        <a title="View Application" data-toggle="tooltip" href="{{ route('admin.preview-tc',['tc_id' => $tc->tc_id , 'student_id' => $tc->id]) }}" class="btn btn-sm btn-info"  target="_blank">View</a>    
                                        <a href="{{ route('admin.tcrestore',['tc_id' => $tc->tc_id]) }}" title="Restore" data-toggle="tooltip" class="btn btn-sm btn-success"><i class="fa fa-undo"></i></a>

                                        <button onclick="$('#user_id').val({{ $tc->tc_id }})"
                                        data-toggle="modal" data-target="#delete_employee" title="Permanently Delete" data-toggle="tooltip" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $tcs->appends($_GET)->links('pagination::bootstrap-4') }}
            </div>
        </div>

        <div id="delete_employee" class="modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-md">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Tc Request</h4>
                    </div>
                    <form action="{{ route('admin.tcdelete') }}" method="POST">
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
