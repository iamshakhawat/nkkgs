@extends('studentportal.layout.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3 shadow">
                <div class="card-header">
                    <h4>Profile</h4>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent text-center">
                                <img class="profile_img mb-2" height="150"  src="@if ($student->photo != "")
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
                                <a href="{{ route('student.edit') }}" class=" btn btn-sm btn-success mt-2"> Edit Profile
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        
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
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        
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
@endsection
