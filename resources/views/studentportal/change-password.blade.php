@extends('studentportal.layout.main')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card p-3 shadow">
                <div class="card-header">
                    Change Password
                </div>
                <form action="{{ route('student.change.password.post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Old Password</label>
                        <input type="password" name="old_password" class="form-control" placeholder="Old Password">
                        @error('old_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" name="new_password" class="form-control" placeholder="New Password">
                        @error('new_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                        @error('confirm_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
