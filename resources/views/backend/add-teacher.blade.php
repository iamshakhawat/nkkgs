@extends('backend.inc.main')
@section('title', 'Add Teacher')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Add Teacher</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                                    Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.all.teacher') }}">Teachers</a></li>
                            <li class="breadcrumb-item"><span> Add Teacher</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form enctype="multipart/form-data" method="POST"
                                    action="{{ route('admin.addPost.teacher') }}">
                                    @csrf
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Firstname</label>
                                                <input type="text" class="form-control" value="{{ old('fname') }}"
                                                    name="fname">
                                                @error('fname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>User ID</label>
                                                <input type="text" class="form-control" value="{{ old('user_id') }}"
                                                    name="user_id">
                                                @error('user_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" value="{{ old('email') }}"
                                                    name="email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option @if (old('gender') == "Female")
                                                        selected
                                                    @endif value="Male"> Male</option>
                                                    <option @if (old('gender') == "Male")
                                                    selected
                                                    @endif value="Female"> Female
                                                    </option>
                                                </select>
                                                @error('gender')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <input class="form-control" value="{{ old('dob') }}" type="date"
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
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" class="form-control" value="{{old('lname') }}"
                                                    name="lname">
                                                @error('lname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Joining Date</label>
                                                <input class="form-control" type="date"
                                                    value="{{ old('joining_date') }}" name="joining_date">
                                                @error('joining_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile number</label>
                                                <input type="text" maxlength="11" value="{{ old('phone') }}"
                                                    class="form-control" name="phone">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('nationality') }}" name="nationality">
                                                @error('nationality')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Blood Group</label>
                                                <select class="form-control" name="blood">
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                </select>
                                                @error('blood')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <select class="form-control" name="subject">
                                                    @foreach ($subjects as $subject)
                                                        <option 
                                                            value="{{ $subject->name }}">{{ $subject->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('subject')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" name="confirm_password">
                                                @error('confirm_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Present Address</label>
                                                <textarea name="current_address" class="form-control" placeholder="Present Address">{{ old('current_address') }}</textarea>

                                                @error('current_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea name="about_me" class="form-control" placeholder="About Me">{{ old('about_me') }}</textarea>

                                                @error('about_me')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Education</label>
                                                <textarea name="qualification" class="form-control" placeholder="Education">{{ old('qualification') }}</textarea>

                                                @error('qualification')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Experience</label>
                                                <textarea class="form-control" name="experience" placeholder="Experience">{{ old('experience')}}</textarea>

                                                @error('experience')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group text-center custom-mt-form-group">
                                                <button class="btn btn-primary mr-2" type="submit">Add Teacher</button>
                                                <a href="{{ route('admin.all.teacher') }}"
                                                    class="btn btn-secondary" >Back</a>
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
