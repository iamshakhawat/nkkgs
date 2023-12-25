@extends('backend.inc.main')
@section('title', 'All Student')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">All Student</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Student</a></li>
                            <li class="breadcrumb-item"><span> All Student</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-sm-4 col-12 mb-3">
                    <a href="{{ route('admin.export.teacher.pdf') }}" class="btn btn-danger"> <i class="fa fa-file-pdf"></i>
                        Export PDF</a>
                    <a href="{{ route('admin.allexport.teacher') }}" class="btn btn-success"> <i
                            class="fa fa-file-excel"></i> Export Excel</a>
                </div> --}}
                <div class="col-sm-8 col-12 text-right add-btn-col">
                    <a href="{{ route('admin.add.teacher') }}" class="btn btn-primary btn-rounded float-right"><i
                            class="fas fa-plus"></i>
                        Add Student</a>
                    <div class="view-icons">
                        <a href="{{ route('admin.all.teacher') }}" class="grid-view btn btn-link active"><i
                                class="fas fa-th"></i></a>
                        <a href="{{ route('admin.all.teacher.list') }}" class="list-view btn btn-link "><i
                                class="fas fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <form action="" method="GET">
                <div class="col-md-12 p-0 mb-2">
                    @if ($name || $section || $class || $roll || $shift)
                        {{ $total }} result found
                    @endif
                </div>
                <div class="row ">
                    <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                            <select name="shift" class="form-control">
                                <option value="">Select Shift</option>
                                <option @if($shift == 'Day') selected @endif value="Day">Day</option>
                                <option @if($shift == 'Morning') selected @endif value="Morning">Morning</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                            <select name="class" class="form-control">
                                <option value="">Select Class</option>
                                <option @if($class == '1') selected @endif value="1">Class 1</option>
                                <option @if($class == '2') selected @endif value="2">Class 2</option>
                                <option @if($class == '3') selected @endif value="3">Class 3</option>
                                <option @if($class == '4') selected @endif value="4">Class 4</option>
                                <option @if($class == '5') selected @endif value="5">Class 5</option>
                                <option @if($class == '6') selected @endif value="6">Class 6</option>
                                <option @if($class == '7') selected @endif value="7">Class 7</option>
                                <option @if($class == '8') selected @endif value="8">Class 8</option>
                                <option @if($class == '9') selected @endif value="9">Class 9</option>
                                <option @if($class == '10') selected @endif value="10">Class 10</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                            <select name="section" class="form-control">
                                <option value="">Section</option>
                                <option @if($section == 'A') selected @endif value="A"> A</option>
                                <option @if($section == 'B') selected @endif value="B"> B</option>
                                <option @if($section == 'C') selected @endif value="C"> C</option>
                                <option @if($section == 'D') selected @endif value="D"> D</option>
                                <option @if($section == 'E') selected @endif value="E"> E</option>
                                <option @if($section == 'F') selected @endif value="F"> F</option>
                                <option @if($section == 'G') selected @endif value="G"> G</option>
                                <option @if($section == 'H') selected @endif value="H"> H</option>
                                <option @if($section == 'I') selected @endif value="I"> I</option>
                                <option @if($section == 'J') selected @endif value="J"> J</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <div class="form-group">
                            <input type="number" value="{{ $roll }}" placeholder="Roll" name="roll"
                                class="form-control ">
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                            <input type="text" value="{{ $name }}" placeholder="Student Name" name="name"
                                class="form-control ">
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-2">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-search w-75 rounded mb-3 mr-2"> search </button>
                            <a href="{{ route('admin.all.student') }}" type="submit"
                                class="btn btn-warning w-20 rounded  mb-3"> Reset </a>
                        </div>
                    </div>
                </div>

            </form>
            <div class="row staff-grid-row">

                @foreach ($students as $student)
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="{{ route('admin.student.profile', ['id' => $student->id]) }}">
                                    @if ($student->photo == null)
                                        <img class="avatar" src="{{ asset('backend') }}/assets/img/user.jpg"
                                            alt="">
                                </a>
                            @else
                                <img class="avatar" src="{{ asset('upload') }}/users/{{ $student->photo }}"
                                    alt="{{ $student->name }}"></a>
                @endif
            </div>
            <div class="dropdown profile-action">
                <a href="javascript:void()" class="action-icon dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('admin.student.profile', ['id' => $student->id]) }}"><i
                            class="fas fa-pencil-alt m-r-5"></i>
                        Edit</a>
                    <a class="dropdown-item" onclick="$('#user_id').val({{ $student->id }})" data-toggle="modal"
                        data-target="#delete_employee"><i class="fas fa-trash-alt m-r-5"></i>
                        Delete</a>
                </div>
            </div>
            <h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a
                    href="{{ route('admin.student.profile', ['id' => $student->id]) }}">{{ $student->name }} <small>({{ $student->roll }})</small></a>
            </h4>
            <div class="small text-black-50">Class: <strong>{{ $student->class }}</strong></div>
            <div class="small text-black-50">Shift: <strong>{{ $student->shift }}</strong></div>
            <div class="small text-black-50">Section: <strong>{{ $student->section }}</strong></div>
        </div>
    </div>
    @endforeach


    </div>
    <div class="d-flex justify-content-center">
        {{ $students->appends($_GET)->links('pagination::bootstrap-4') }}
    </div>
    </div>
    </div>

    <div id="delete_employee" class="modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                </div>
                <form action="{{ route('admin.delete.student') }}" method="POST">
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
