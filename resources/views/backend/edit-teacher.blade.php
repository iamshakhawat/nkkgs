@extends('backend.inc.main')
@section('title', 'Edit Teacher')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Edit Teacher</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Teachers</a></li>
                            <li class="breadcrumb-item"><span> Edit Teacher</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.editPost.teacher') }}">
                                    <input type="hidden" value="{{ $teacher->id }}" name="id">
                                    @csrf
                                    <div class="d-flex justify-content-center align-items-center mb-4">
                                        @if ($teacher->photo != '')
                                            <img style="border-radius:50%"
                                                src="{{ asset('/upload') }}/users/{{ $teacher->photo }}"
                                                width="100" height="100">
                                        @else
                                            <img style="border-radius:50%" src="{{ asset('backend') }}/assets/img/user.jpg"
                                                width="100" height="100">
                                        @endif
                                    </div>

                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Firstname</label>
                                                <input type="text" class="form-control" value="{{ $teacher->fname }}"
                                                    name="fname">
                                                @error('fname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>User ID</label>
                                                <input type="text" class="form-control" value="{{ $teacher->user_id }}"
                                                    name="user_id">
                                                @error('user_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" value="{{ $teacher->email }}"
                                                    name="email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option @if ($teacher->gender == 'Male') selected @endif
                                                        value="Male">
                                                        Male</option>
                                                    <option @if ($teacher->gender == 'Female') selected @endif
                                                        value="Female">
                                                        Female
                                                    </option>
                                                </select>
                                                @error('gender')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <input class="form-control" value="{{ $teacher->dob }}" type="date"
                                                    name="dob">
                                                @error('dob')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Upload Image</label>
                                                <input type="file" name="photo" accept="image/*" class="form-control">

                                                @error('photo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" class="form-control" value="{{ $teacher->lname }}"
                                                    name="lname">
                                                @error('lname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Joining Date</label>
                                                <input class="form-control" type="date"
                                                    value="{{ $teacher->joining_date }}" name="joining_date">
                                                @error('joining_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile number</label>
                                                <input type="text" maxlength="11" value="{{ $teacher->phone }}"
                                                    class="form-control" name="phone">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $teacher->nationality }}" name="nationality">
                                                @error('nationality')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Blood Group</label>
                                                <select class="form-control" name="blood">
                                                    <option {{ $teacher->blood_group == 'A+' ? 'selected' : '' }}
                                                        value="A+">A+</option>
                                                    <option {{ $teacher->blood_group == 'A-' ? 'selected' : '' }}
                                                        value="A-">A-</option>
                                                    <option {{ $teacher->blood_group == 'B+' ? 'selected' : '' }}
                                                        value="B+">B+</option>
                                                    <option {{ $teacher->blood_group == 'B-' ? 'selected' : '' }}
                                                        value="B-">B-</option>
                                                    <option {{ $teacher->blood_group == 'O+' ? 'selected' : '' }}
                                                        value="O+">O+</option>
                                                    <option {{ $teacher->blood_group == 'O-' ? 'selected' : '' }}
                                                        value="O-">O-</option>
                                                    <option {{ $teacher->blood_group == 'AB+' ? 'selected' : '' }}
                                                        value="AB+">AB+</option>
                                                    <option {{ $teacher->blood_group == 'AB-' ? 'selected' : '' }}
                                                        value="AB-">AB-</option>
                                                </select>
                                                @error('blood')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <select class="form-control" name="subject">
                                                    @foreach ($subjects as $subject)
                                                        <option @if ($teacher->subject == $subject->name) selected @endif
                                                            value="{{ $subject->name }}">{{ $subject->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('subject')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Present Address</label>
                                                <textarea name="current_address" class="form-control" placeholder="Present Address">{{ $teacher->current_address }}</textarea>

                                                @error('current_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea name="about_me" class="form-control" placeholder="About Me">{{ $teacher->about_me }}</textarea>

                                                @error('about_me')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Education</label>
                                                <textarea name="qualification" class="form-control" placeholder="Education">{{ $teacher->qualification }}</textarea>

                                                @error('qualification')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Experience</label>
                                                <textarea class="form-control" name="experience" placeholder="Experience">{{ $teacher->experience }}</textarea>

                                                @error('experience')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group text-center custom-mt-form-group">
                                                <button class="btn btn-primary mr-2" type="submit">Submit</button>
                                                <a href="{{ route('admin.profile.teacher', ['id' => $teacher->id]) }}"
                                                    class="btn btn-secondary" type="reset">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
