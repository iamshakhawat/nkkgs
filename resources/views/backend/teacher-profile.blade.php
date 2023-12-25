@extends('backend.inc.main')
@section('title', 'All Teacher')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">about teacher</h5>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.all.teacher') }}">Teachers</a></li>
                            <li class="breadcrumb-item"><span> About Teacher</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content-page">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="aboutprofile-sidebar">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="aboutprofile">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="aboutprofile-pic">
                                                            @if ($teacher->photo == '')
                                                                <img class="card-img-top"
                                                                    src="{{ asset('backend') }}/assets/img/user.jpg"
                                                                    alt="Card image">
                                                            @else
                                                                <img class="card-img-top"
                                                                    src="{{ asset('upload') }}/users/{{ $teacher->photo }}"
                                                                    alt="Card image">
                                                            @endif
                                                        </div>
                                                        <div class="aboutprofile-name">
                                                            <h5 class="text-center mt-2">{{ $teacher->name }}</h5>
                                                            <p class="text-center">{{ $teacher->subject }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aboutme-profile">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="page-title">About Me</h4>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><b>ID</b><a href="javascript:void()"
                                                            class="float-right">{{ $teacher->user_id }}</a></li>
                                                    <li class="list-group-item"><b>Gender</b><a href="javascript:void()"
                                                            class="float-right">{{ $teacher->gender }}</a></li>
                                                    <li class="list-group-item"><b>Subject</b><a href="javascript:void()"
                                                            class="float-right">{{ $teacher->subject }}</a></li>
                                                    <li class="list-group-item"><b>Date of Birth</b><a
                                                            href="javascript:void()"
                                                            class="float-right">{{ $teacher->dob }}</a></li>
                                                    <li class="list-group-item"><b>Blood Group</b><a
                                                            href="javascript:void()"
                                                            class="float-right">{{ $teacher->blood_group }}</a></li>
                                                    <li class="list-group-item"><b>Email</b><a href="javascript:void()"
                                                            class="float-right">{{ $teacher->email }}</a></li>
                                                    <li class="list-group-item"><b>Phone</b><a href="javascript:void()"
                                                            class="float-right">{{ $teacher->phone }}</a>
                                                    </li>
                                                    <li class="list-group-item"><b>Nationality</b><a
                                                            href="javascript:void()"
                                                            class="float-right">{{ $teacher->nationality }}</a>
                                                    </li>
                                                    <li class="list-group-item"><b>Joining Date</b><a
                                                            href="javascript:void()"
                                                            class="float-right">{{ $teacher->joining_date }}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aboutprofile-address mt-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="page-title">Address</h4>
                                            </div>
                                            <div class="card-body">
                                                <address class="text-left">
                                                    {{ $teacher->current_address }}
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                                    <div class="profile-content">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">

                                                    <div class="card-header">
                                                        <div class=" d-flex justify-content-between">

                                                            <h4 class="page-title">About Me</h4>
                                                            <a href="{{ route('admin.edit.teacher',[$teacher->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                        </div>
                                                    </div>

                                                    <div class="card-body">
                                                        <div id="biography" class="biography">
                                                            <div class="row">
                                                                <div class="col-md-3 col-6"> <strong>Full
                                                                        Name</strong>
                                                                    <p class="text-muted">{{ $teacher->name }}</p>
                                                                </div>
                                                                <div class="col-md-3 col-6"> <strong>Mobile</strong>
                                                                    <p class="text-muted">{{ $teacher->phone }}</p>
                                                                </div>
                                                                <div class="col-md-3 col-6"> <strong>Email</strong>
                                                                    <p class="text-muted"><a
                                                                            href="#">{{ $teacher->email }}</a>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-3 col-6">
                                                                    <strong>Subject</strong>
                                                                    <p class="text-muted">{{ $teacher->subject }}</p>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <p>
                                                                {{ $teacher->about_me }}
                                                            </p>
                                                            <h4>Education</h4>
                                                            <hr>
                                                            <p>
                                                                {{ $teacher->qualification }}
                                                            </p>
                                                            <h4>Experience</h4>
                                                            <hr>
                                                            <p>{{ $teacher->experience }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
