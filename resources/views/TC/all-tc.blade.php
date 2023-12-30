@extends('backend.inc.main')
@section('title', 'All TC Request')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row justify-content-between">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">All TC List</h5>
                    </div>
                    <a href="{{ route('admin.tctrash') }}" class="btn btn-info text-white"><i class="fa fa-trash"></i> Trash</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class=" table-responsives">
                        
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20px">#</th>
                                <th style="width:80px">Photo</th>
                                <th style="width:200px">Name</th>
                                <th>Roll</th>
                                <th>Class</th>
                                <th style="">Reason for TC</th>
                                <th>Status</th>
                                <th style="width: 200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tcs as $tc)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <a href="{{ route('admin.student.profile',['id' => $tc->id]) }}">
                                        <img class=" rounded-circle" height="50" width="50" src="@if ($tc->photo != "")
                                        {{ asset('upload') }}/users/{{ $tc->photo }}
                                        @else
                                        {{ asset('backend') }}/assets/img/user.jpg
                                    @endif"
                                        alt=""></a></td>
                                    <td><a href="{{ route('admin.student.profile',['id' => $tc->id]) }}">{{ $tc->name }}</a></td>
                                    <td>{{ $tc->roll }}</td>
                                    <td>{{ $tc->class }}</td>
                                    <td>{{ $tc->reason }}</td>
                                    <td>
                                        @if ($tc->confirmation == 0)
                                            <span class="badge text-white" style="background:#e9ab2e">Waiting</span>
                                        @elseif ($tc->confirmation == 1)
                                            <span class="badge text-white" style="background:#4ab657">Approve</span>
                                        @else
                                            <span class="badge text-white" style="background:#ff1300">Decline</span>
                                        @endif
                                    </td>
                                    <td>



                                        @if ($tc->confirmation < 1)
                                        <a data-toggle="tooltip" title="View" href="{{ route('admin.preview-tc',['tc_id' => $tc->tc_id , 'student_id' => $tc->id]) }}" class="btn btn-sm btn-info m-1"  target="_blank">View</a>

                                            <button onclick="$('#user_id').val({{ $tc->tc_id }})" data-target="#approve_modal" data-toggle="modal"    class="btn btn-sm btn-success"><i data-toggle="tooltip"  title="Approve" class="fa fa-check"></i></button>

                                            <button onclick="$('#user_id_reject').val({{ $tc->tc_id }})" data-target="#reject_modal" data-toggle="modal"    class="btn btn-sm btn-danger"><i data-toggle="tooltip"  title="Reject" class="fa fa-times"></i></button>
                                        @elseif ($tc->confirmation == 1)
                                        
                                            <a href="{{ route('admin.tcdownload',['id' => $tc->tc_id]) }}" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a>

                                        @else
                                        <a data-toggle="tooltip" title="View" href="{{ route('admin.preview-tc',['tc_id' => $tc->tc_id , 'student_id' => $tc->id]) }}" class="btn btn-sm btn-info" target="_blank">View</a>
                                        @endif
                                        <a data-toggle="tooltip" title="Move to Trash" href="{{ route('admin.movetotctrash',['id' => $tc->tc_id]) }}" class="btn btn-sm btn-warning m-1"><i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $tcs->appends($_GET)->links('pagination::bootstrap-4') }}
            </div>
        </div>

        <div id="approve_modal" class="modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-md">
                    <div class="modal-header">
                        <h4 class="modal-title">Are you sure?</h4>
                    </div>
                    <form action="{{ route('admin.tcapprove') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <p>If you are sure to transfer this student so click approve. you can also send some messege to requested student</p>
                            <textarea name="message" required cols="30" rows="4" placeholder="Send some essential message" class="form-control">Best Wish For you</textarea>
                            <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                <input type="hidden" required id="user_id" name="user_id">
                                <button type="submit" class="btn btn-success">Approve</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="reject_modal" class="modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-md">
                    <div class="modal-header">
                        <h4 class="modal-title">Are you sure?</h4>
                    </div>
                    <form action="{{ route('admin.tcreject') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <p>If you are sure to transfer this student so click reject. you can also send some messege to requested student</p>
                            <textarea name="message" required cols="30" rows="4" placeholder="Send some essential message" class="form-control">Sorry. We can't provide transfer certificate at this time.</textarea>
                            <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                <input type="hidden" required id="user_id_reject" name="user_id">
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
