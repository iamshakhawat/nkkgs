@extends('backend.inc.main')
@section('title', 'Student')
@section('content')
<style>
    body {
  padding: 0;
  margin: 0;
  font-family: 'Lato', sans-serif;
  color: #000;
}

.student-profile .card {
  border-radius: 10px;
}

.student-profile .card .card-header .profile_img {
  width: 150px;
  height: 150px;
  object-fit: cover;
  margin: 10px auto;
  border: 10px solid #ccc;
  border-radius: 50%;
}

.student-profile .card h3 {
  font-size: 20px;
  font-weight: 700;
}

.student-profile .card p {
  font-size: 16px;
  color: #000;
}

.student-profile .table th,
.student-profile .table td {
  font-size: 14px;
  padding: 5px 10px;
  color: #000;
}
</style>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">{{ $student->name }}</h5>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.all.teacher') }}">Students</a></li>
                            <li class="breadcrumb-item"><span> Student Profile</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content-page">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Student Profile -->
                        <div class="student-profile py-4">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-transparent text-center">
                                                <img class="profile_img" src="@if ($student->photo != "")
                                                    {{ asset('upload') }}/users/{{ $student->photo }}
                                                    @else
                                                    {{ asset('backend') }}/assets/img/user.jpg
                                                @endif"
                                                    alt="">
                                                <h3>{{ $student->name}}</h3>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0"><strong class="pr-1">Student ID:</strong>{{ $student->user_id }}</p>
                                                <p class="mb-0"><strong class="pr-1">Class:</strong>{{ $student->class }}</p>
                                                <p class="mb-0"><strong class="pr-1">Section:</strong>{{ $student->section }}</p>
                                                <p class="mb-0"><strong class="pr-1">Birth Date:</strong>{{ $student->dob }}</p>
                                                <a href="{{ route('admin.edit.student',['id' => $student->id]) }}" class="btn btn-success">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-transparent border-0">
                                                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                                            </div>
                                            <div class="card-body pt-0">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th width="30%">Roll</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->roll }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Shift </th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->shift }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Gender</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->gender}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Religion</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->religion }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Blood Group</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->blood_group}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Nationality</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->nationality}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-transparent border-0">
                                                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Parent's Information</h3>
                                            </div>
                                            <div class="card-body pt-0">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th width="30%">Father's Name</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->father_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Mother's Name</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->mother_name }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th width="30%">Parent Email</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->parent_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Parent Phone</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->parent_phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Emergency Contact</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->emergency_contact }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="card shadow-sm">
                                            <div class="card-header bg-transparent border-0">
                                                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other's Information</h3>
                                            </div>
                                            <div class="card-body pt-0">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th width="30%">Email</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Phone</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->phone }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th width="30%">Current Address</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->current_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Parmanent Address</th>
                                                        <td width="2%">:</td>
                                                        <td>{{ $student->parmanent_address }}</td>
                                                    </tr>
                                                </table>
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
