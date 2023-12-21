@extends('backend.inc.main')
@section('title', 'Settings')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">New Password</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                                    Home</a>
                            </li>
                            <li class="breadcrumb-item"><span>Settings</span></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">

                            <div class="text-center">
                                <h4>Change Password</h4>
                                <hr>
                            </div>



                            <form action="{{ route('admin.new.password') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>New Password<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="new_password">
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Confirm Password<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="confirm_password">
                                            @error('confirm_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-block m-auto text-center">
                                        <button type="submit" class="btn btn-primary mb-2">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>



        </div>
    </div>
@endsection
