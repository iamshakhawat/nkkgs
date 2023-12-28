@extends('backend.inc.main')
@section('title', 'All Parents')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">All Parents</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Parents</a></li>
                            <li class="breadcrumb-item"><span> All Parents</span></li>
                        </ul>
                    </div>
                </div>
            </div>
                <div class=" text-right add-btn-col">
                    <a href="{{ route('add.parent') }}" class="btn btn-primary btn-rounded "><i class="fas fa-plus"></i> Add a new Parent</a>
                </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20px">#</th>
                                <th style="width:50px">Image</th>
                                <th style="width:200px">Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Blood</th>
                                <th style="width:120px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parents as $parent)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <a href="{{ route('parent.profile',['id' => $parent->id]) }}">
                                            @if ($parent->photo == '')
                                                <img class="rounded-circle" height="30" width="30"
                                                    src="{{ asset('backend') }}/assets/img/user.jpg" alt="Card image">
                                            @else
                                                <img class="rounded-circle " height="30" width="30"
                                                    src="{{ asset('upload') }}/users/{{ $parent->photo }}" alt="Card image">
                                            @endif
                                        </a>
                                    </td>
                                    <td>
                                        <h2 class="mb-0"><a
                                                href="{{ route('parent.profile', ['id' => $parent->id]) }}">{{ $parent->name }}</a>
                                        </h2>
                                    </td>
                                    <td><a href="mailto:{{ $parent->email }}">{{ $parent->email }}</a></td>
                                    <td><a href="tel:{{ $parent->phone }}">{{ $parent->phone }}</a></td>
                                    <td>{{ $parent->gender }}</td>
                                    <td>{{ $parent->blood_group }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{ route('edit.parent.profile',['id' => $parent->id]) }}"><i class=" fa fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger" onclick="$('#user_id').val({{ $parent->id }})"
                                            data-toggle="modal" data-target="#delete_employee"><i
                                                class="fas fa-trash-alt m-r-5"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $parents->appends($_GET)->links('pagination::bootstrap-4') }}
            </div>
        </div>

        <div id="delete_employee" class="modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-md">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                    </div>
                    <form action="{{ route('parent.movetotrash') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <p>Are you sure want to delete this?</p>
                            <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                <input type="hidden" id="user_id" name="user_id">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    @endsection
