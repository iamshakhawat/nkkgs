@extends('backend.inc.main')
@section('title', 'Parent Profile')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Parent Profile</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                                    Home</a>
                            </li>
                            <li class="breadcrumb-item"><span>Parent Profile</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-box m-b-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="">
                                        @if ($parent->photo != '')
                                            <img class="avatar" src="{{ asset('upload') }}/users/{{ $parent->photo }}"
                                                alt="{{ $parent->fname }}">
                                        @else
                                            <img class="rounded-circle" src="{{ asset('backend') }}/assets/img/user.jpg"
                                                width="30" height="30" alt="{{ $parent->fname }}">
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0">{{ $parent->name }}</h3>
                                            <h5 class="company-role m-t-0 m-b-1">Role: <span
                                                    class="badge badge-primary">{{ Str::ucfirst($parent->role) }}</span>
                                            </h5>
                                            <a href="{{ route('edit.parent.profile', ['id' => $parent->id]) }}"
                                                class="btn btn-sm btn-primary">Edit Profile</a>
                                            <a href="{{ route('parent.all') }}" class="btn btn-sm btn-info">Back</a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Phone:</span>
                                                <span class="text"><a
                                                        href="tel:{{ $parent->phone }}">{{ $parent->phone }}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"><a
                                                        href="mailto:{{ $parent->email }}">{{ $parent->email }}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Gender:</span>
                                                <span class="text">{{ $parent->gender }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Blood Group:</span>
                                                <span class="text">{{ $parent->blood_group }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <br>

                        </div>
                    </div>


                   

                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card shadow-sm rounded-0">
                <div class="card-header bg-transparent border-0">
                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Student Information</h3>
                </div>
                <div class="card-body pt-0">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%">Photo</th>
                                <td width="2%">:</td>
                                <td>
                                    @isset ($student->photo)
                                        @if ($student->photo != '')
                                                <img class="avatar" src="{{ asset('upload') }}/users/{{ $student->photo }}" height="100"
                                                    alt="{{ $student->fname }}">
                                            @else
                                                <img class="rounded-circle" src="{{ asset('backend') }}/assets/img/user.jpg"
                                                     height="100" alt="{{ $student->fname }}">
                                            @endif
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <th width="30%">Name</th>
                                <td width="2%">:</td>
                                <td><strong>
                                @isset($student->name)
                                    {{ $student->name }}
                                @endisset
                                    
                                </strong></td>
                            </tr>
                            <tr>
                                <th width="30%">Roll</th>
                                <td width="2%">:</td>
                                <td><strong>
                                @isset($student->roll)    {{ $student->roll }} @endisset
                                </strong></td>
                            </tr>
                            <tr>
                                <th width="30%">Class</th>
                                <td width="2%">:</td>
                                <td> <strong>
                                @isset($student->class)    {{ 'Class '.$student->class }} @endisset
                                </strong></td>
                            </tr>
                            <tr>
                                <th width="30%">Section</th>
                                <td width="2%">:</td>
                                <td><strong>
                                @isset($student->section)    {{ $student->section }} @endisset
                                </strong></td>
                            </tr>
                            <tr>
                                <th width="30%">Shift </th>
                                <td width="2%">:</td>
                                <td><strong>
                                @isset($student->shift)    {{ $student->shift }} @endisset
                                </strong></td>
                            </tr>
                            <tr>
                                <th width="30%">Gender</th>
                                <td width="2%">:</td>
                                <td><strong>
                                @isset($student->gender)    {{ $student->gender }} @endisset
                                </strong></td>
                            </tr>
                            <tr>
                                <th width="30%">Religion</th>
                                <td width="2%">:</td>
                                <td><strong>
                                @isset($student->religion)    {{ $student->religion }} @endisset
                                </strong></td>
                            </tr>
                            <tr>
                                <th width="30%">Blood Group</th>
                                <td width="2%">:</td>
                                <td><strong>
                                @isset($student->blood_group)    {{ $student->blood_group }} @endisset
                                </strong></td>
                            </tr>
                            <tr>
                                <th width="30%">Nationality</th>
                                <td width="2%">:</td>
                                <td><strong>
                                @isset($student->nationality)    {{ $student->nationality }} @endisset
                                </strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
@endsection
