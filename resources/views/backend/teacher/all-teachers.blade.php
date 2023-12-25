@extends('backend.inc.main')
@section('title', 'All Teacher')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Teachers</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Teachers</a></li>
                            <li class="breadcrumb-item"><span> All Teachers</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12 mb-3">
                    <a href="{{ route('export.all.teacher.pdf') }}" class="btn btn-danger"> <i class="fa fa-file-pdf"></i>
                        Export PDF</a>
                    <a href="{{ route('export.all.teacher.excel') }}" class="btn btn-success"> <i
                            class="fa fa-file-excel"></i> Export Excel</a>
                </div>
                <div class="col-sm-8 col-12 text-right add-btn-col">
                    <a href="{{ route('admin.add.teacher') }}" class="btn btn-primary btn-rounded float-right"><i
                            class="fas fa-plus"></i>
                        Add Teacher</a>
                    <div class="view-icons">
                        <a href="{{ route('admin.teacher.trash') }}" class="btn btn-link"><i class="fa fa-trash-alt"></i></a>

                        <a href="{{ route('admin.all.teacher') }}" class="grid-view btn btn-link active"><i
                                class="fas fa-th"></i></a>
                        <a href="{{ route('admin.all.teacher.list') }}" class="list-view btn btn-link "><i
                                class="fas fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <form action="" method="GET">
                <div class="row ">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <input value="{{ $id }}" type="text" placeholder="Teacher ID" name="id"
                                class="form-control ">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <input type="text" value="{{ $name }}" placeholder="Teacher Name" name="name"
                                class="form-control ">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group ">
                            <select class="form-control" name="subject">
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                    <option @if ($searchSubject == $subject->name) selected @endif value="{{ $subject->name }}">
                                        {{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-search w-75 rounded mb-3 mr-2"> search </button>
                            <a href="{{ route('admin.all.teacher') }}" type="submit"
                                class="btn btn-warning w-20 rounded  mb-3"> Reset </a>
                        </div>
                    </div>
                </div>

            </form>
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
                    <a class="dropdown-item" href="{{ route('admin.edit.teacher', ['id' => $teacher->id]) }}"><i
                            class="fas fa-pencil-alt m-r-5"></i>
                        Edit</a>
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
