@extends('backend.inc.main')
@section('title','Add Admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Add Admin</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                                    Home</a>
                            </li>
                            <li class="breadcrumb-item"><span>Add Admin</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Basic information</div>
                            </div>
                            <div class="card-body">
                                <form autocomplete="off" action="{{ route('admin.insert.admin') }}" method="POST" en autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Firstname <span class="text-danger">*</span></label>
                                                <input autocomplete="off"  type="text" class="form-control" value="{{ old('fname') }}" name="fname"
                                                   >
                                                @error('fname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input autocomplete="off" value="{{ old('email') }} " type="email" name="email" class="form-control"
                                                   >
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option  @if (old('gender') == 'Female')
                                                        selected
                                                    @endif  value="Female">Female</option>
                                                    <option  @if (old('gender') == 'Male')
                                                        selected
                                                    @endif  value="Male">Male</option>
                                                </select>
                                                @error('gender')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>UserID <span class="text-danger">*</span></label>
                                                <input autocomplete="off"  value="{{ old('user_id') }} " type="text" name="user_id" class="form-control"
                                                    >
                                                @error('user_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Present Address</label>
                                                <input autocomplete="off" value="{{ old('present_address') }} " type="text" name="present_address" class="form-control"
                                                    >

                                                @error('present_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Profile Picture</label>
                                                <input autocomplete="off"  type="file" name="photo" accept=".jpg,.png,.jpeg"
                                                    class="form-control">

                                                @error('photo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Lastname <span class="text-danger">*</span></label>
                                                <input autocomplete="off" value="{{ old('lname') }} " type="text" class="form-control" name="lname"
                                                    >
                                                @error('lname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input autocomplete="off" value="{{ old('phone') }}" type="text" maxlength="11" name="phone" class="form-control"
                                                    >
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Blood Group</label>
                                                <select class="form-control" name="blood">
                                                    <option value="">Select Blood Group</option>
                                                    <option @if(old('blood') == 'A+') selected @endif value="A+">A+</option>
                                                    <option @if(old('blood') == 'A-') selected @endif value="A-">A-</option>
                                                    <option @if(old('blood') == 'B+') selected @endif value="B+">B+</option>
                                                    <option @if(old('blood') == 'B-') selected @endif value="B-">B-</option>
                                                    <option @if(old('blood') == 'O+') selected @endif value="O+">O+</option>
                                                    <option @if(old('blood') == 'O-') selected @endif value="O-">O-</option>
                                                    <option @if(old('blood') == 'AB+') selected @endif value="AB+">AB+</option>
                                                    <option @if(old('blood') == 'AB-') selected @endif value="AB-">AB-</option>
                                                </select>
                                                @error('blood')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Parmanent Address</label>
                                                <input autocomplete="off" value="{{ old('parmanent_address') }}" type="text" name="parmanent_address" class="form-control" >
                                                @error('parmanent_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Password <span class="text-danger">*</span></label>
                                                <input autocomplete="off"  type="password" name="password" class="form-control" >
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Confirm Password  <span class="text-danger">*</span></label>
                                                <input autocomplete="off"  type="password" name="confrim_password" class="form-control" >
                                                @error('confrim_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary mr-2" autocomplete="off"  type="submit">Add</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
