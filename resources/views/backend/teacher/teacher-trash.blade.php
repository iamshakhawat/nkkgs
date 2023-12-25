@extends('backend.inc.main')
@section('title', 'Teacher Trash')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Trash</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.all.teacher') }}">All Teachers</a></li>
                            <li class="breadcrumb-item"><span>Trash</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row staff-grid-row">

                @foreach ($teachers as $teacher)
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="{{ route('admin.profile.teacher', ['id' => $teacher->id]) }}">
                                    @if ($teacher->photo == null)
                                        <img class="avatar" src="{{ asset('backend') }}/assets/img/user.jpg"
                                            alt="">
                                </a>
                            @else
                                <img class="avatar" src="{{ asset('upload') }}/users/{{ $teacher->photo }}"
                                    alt="{{ $teacher->name }}"></a>
                @endif
            </div>
            <div class="dropdown profile-action">
                <a href="javascript:void()" class="action-icon dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('admin.restore.teacher', ['id' => $teacher->id]) }}"><i
                            class="fas fa-undo m-r-5"></i>
                        Restore</a>
                    <a class="dropdown-item" onclick="$('#user_id').val({{ $teacher->id }})" data-toggle="modal"
                        data-target="#delete_employee"><i class="fas fa-trash-alt m-r-5"></i>
                        Delete</a>
                </div>
            </div>
            <h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a
                    href="{{ route('admin.profile.teacher', ['id' => $teacher->id]) }}">{{ $teacher->name }}</a>
            </h4>
            <div class="small text-muted">{{ $teacher->subject }}</div>
        </div>
    </div>
    @endforeach


    </div>
    <div class="d-flex justify-content-center">
        {{ $teachers->appends($_GET)->links('pagination::bootstrap-4') }}
    </div>
    </div>
    </div>

    <div id="delete_employee" class="modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                </div>
                <form action="{{ route('admin.forcedelete.teacher') }}" method="POST">
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
