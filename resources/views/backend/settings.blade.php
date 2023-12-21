@extends('backend.inc.main')
@section('title', 'Settings')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Settings</h5>
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


            <div class="row">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">

                            <div class="text-center">
                                <h4>Change Password</h4>
                                <hr>
                            </div>



                            <form action="{{ route('admin.change.password') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Old Password<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="old_password">
                                            @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
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
                                        <a href="{{ route('admin.forget.password') }}" class="d-block">Forget Password</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <h4>Delete Account</h4>
                                    <p>If you don't need this account,so you can delete this account.</p>
                                </div>

                                <div>
                                    <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModalCenter">Delete Account</button>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to delete account? <br>
                                After Delete you can't able to restore your account. Be careful
                            </p>
                            <strong>Type "Delete" to continue</strong>
                            <input type="text" class="form-control" id="confirm_delete">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                            <button type="button" id="conBtn" class="btn btn-danger">Continue</button>
                        </div>
                        <script>
                            $("#conBtn").click(function() {
                                if (($("#confirm_delete").val() != "") && ($("#confirm_delete").val() == "Delete")) {
                                    $("#confirm_delete").css('border', '1px solid #ccc');
                                    $("#exampleModalCenter").modal('hide');
                                    $("#confrimModal").modal('show');
                                } else {
                                    $("#confirm_delete").css('border', '1px solid red');
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="confrimModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('admin.account.delete') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <strong>Be Carefull You can't Restore Data.</strong>
                                <input type="password" class="form-control" placeholder="Account Password" name="password">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
