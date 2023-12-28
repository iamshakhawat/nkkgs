@extends('backend.inc.main')
@section('title', 'Add Parent')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Add Parent</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                                    Home</a>
                            </li>
                            <li class="breadcrumb-item"><span>Add Parent</span></li>
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
                                <form action="{{ route('add.parent.post') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Firstname</label>
                                                <input type="text" class="form-control" name="fname"
                                                    value="{{ old('fname') }}">
                                                @error('fname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option value="Female"
                                                        {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                                        Male</option>
                                                </select>
                                                @error('gender')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Profile Picture</label>
                                                <input type="file" name="photo" accept=".jpg,.png,.jpeg"
                                                    class="form-control">

                                                @error('photo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" class="form-control" name="lname"
                                                    value="{{ old('lname') }}">
                                                @error('lname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" maxlength="11" name="phone" class="form-control"
                                                    value="{{ old('phone') }}">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Blood Group</label>
                                                <select class="form-control" name="blood">
                                                    <option {{ old('blood_group') == 'A+' ? 'selected' : '' }}
                                                        value="A+">A+</option>
                                                    <option {{ old('blood_group') == 'A-' ? 'selected' : '' }}
                                                        value="A-">A-</option>
                                                    <option {{ old('blood_group') == 'B+' ? 'selected' : '' }}
                                                        value="B+">B+</option>
                                                    <option {{ old('blood_group') == 'B-' ? 'selected' : '' }}
                                                        value="B-">B-</option>
                                                    <option {{ old('blood_group') == 'O+' ? 'selected' : '' }}
                                                        value="O+">O+</option>
                                                    <option {{ old('blood_group') == 'O-' ? 'selected' : '' }}
                                                        value="O-">O-</option>
                                                    <option {{ old('blood_group') == 'AB+' ? 'selected' : '' }}
                                                        value="AB+">AB+</option>
                                                    <option {{ old('blood_group') == 'AB-' ? 'selected' : '' }}
                                                        value="AB-">AB-</option>
                                                </select>
                                                @error('blood')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="confirm_password" class="form-control">
                                                @error('confirm_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary mr-2" type="submit">Save</button>
                                            <button class="btn btn-secondary" type="button"
                                                onclick="window.location.href='{{ route('parent.all') }}'">Cancel</button>
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
