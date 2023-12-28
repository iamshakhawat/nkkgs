@extends('backend.inc.main')
@section('title', "$parent->name")
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Edit Parent Profile</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                                    Home</a>
                            </li>
                            <li class="breadcrumb-item"><span>Edit Parent Profile</span></li>
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
                                <form action="{{ route('parent.editPost') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $parent->id }}">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Firstname</label>
                                                <input type="text" class="form-control" name="fname"
                                                    value="{{ $parent->fname }}">
                                                @error('fname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ $parent->email }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option value="Female"
                                                        {{ $parent->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                    <option value="Male" {{ $parent->gender == 'Male' ? 'selected' : '' }}>
                                                        Male</option>
                                                </select>
                                                @error('gender')
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
                                                    value="{{ $parent->lname }}">
                                                @error('lname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" maxlength="11" name="phone" class="form-control"
                                                    value="{{ $parent->phone }}">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Blood Group</label>
                                                <select class="form-control" name="blood">
                                                    <option {{ $parent->blood_group == 'A+' ? 'selected' : '' }}
                                                        value="A+">A+</option>
                                                    <option {{ $parent->blood_group == 'A-' ? 'selected' : '' }}
                                                        value="A-">A-</option>
                                                    <option {{ $parent->blood_group == 'B+' ? 'selected' : '' }}
                                                        value="B+">B+</option>
                                                    <option {{ $parent->blood_group == 'B-' ? 'selected' : '' }}
                                                        value="B-">B-</option>
                                                    <option {{ $parent->blood_group == 'O+' ? 'selected' : '' }}
                                                        value="O+">O+</option>
                                                    <option {{ $parent->blood_group == 'O-' ? 'selected' : '' }}
                                                        value="O-">O-</option>
                                                    <option {{ $parent->blood_group == 'AB+' ? 'selected' : '' }}
                                                        value="AB+">AB+</option>
                                                    <option {{ $parent->blood_group == 'AB-' ? 'selected' : '' }}
                                                        value="AB-">AB-</option>
                                                </select>
                                                @error('blood')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label>Picture Preview</label>
                                                <div class="d-block">

                                                    @if ($parent->photo != '')
                                                        <img src="{{ asset('upload') }}/users/{{ $parent->photo }}"
                                                            height="150" alt="{{ $parent->fname }}">
                                                    @else
                                                        <img src="{{ asset('backend') }}/assets/img/user.jpg"
                                                            height="150" alt="{{ $parent->fname }}">
                                                    @endif
                                                </div>

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
