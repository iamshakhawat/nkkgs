@extends('backend.inc.main')
@section('title', 'All Admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">All Admin</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                                    Home</a>
                            </li>
                            <li class="breadcrumb-item"><span>All Admin</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <a target="_blank" href="{{ route('export.all.admin.excel') }}" class="btn btn-primary mr-2"><i class="fa fa-file-excel"></i> Exel Export</a>
                                    <a target="_blank" href="{{ route('export.all.admin.pdf') }}" class="btn btn-info"><i class="fa fa-file-pdf"></i> PDF Export</a>
                                </div>
                                <div>
                                    <a href="{{ route('admin.trash.admin') }}" class="btn btn-danger mr-2"><i class="fa fa-trash"></i> Trash</a>
                                </div>

                            </div>
                            <div class="card-body">
                                <form action="">
                                <div class="d-flex justify-content-between">
                                    <div class="col-md-4 p-0">
                                            
                                        <div class="d-flex">
                                            <input type="text" name="search" id="search" class="form-control rounded-0"
                                                placeholder="Search here" value="{{ $search }}" >
                                            <button type="submit" class="btn btn-success rounded-0"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-2 p-0">
                                        <div class="d-flex">
                                            <select class="form-control rounded-0" name="filter" id="filter">
                                                <option @if($filter == '') selected @endif value="">Filter</option>
                                                <option @if($filter == 'a2z') selected @endif value="a2z">A to Z</option>
                                                <option @if($filter == 'z2a') selected @endif value="z2a">Z to A</option>
                                                <option @if($filter == 'active') selected @endif value="active">Active</option>
                                            </select>
                                            <button type="submit" class="btn btn-success rounded-0"><i
                                                    class="fa fa-filter"></i></button>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                                <div id="serverResponse" >
                                    <table class="table table-bordered mt-3 table-striped table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width:5%">#</th>
                                                <th style="width:30%">Name</th>
                                                <th style="width:25%">Contact Details</th>
                                                <th style="width:25%">Address</th>
                                                <th style="width:15%">Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_tbody">
                                            @foreach ($admins as $admin)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-start align-items-center">
                                                            @if ($admin->photo != '')
                                                                <img class="rounded-circle mr-1"
                                                                    src="{{ asset('upload') }}/users/{{ $admin->photo }}"
                                                                    width="50" height="50"
                                                                    alt="{{ $admin->fname }}'s Photo">
                                                            @else
                                                                <img class="rounded-circle mr-1"
                                                                    src="{{ asset('backend') }}/assets/img/user.jpg"
                                                                    width="50" height="50" alt="{{ $admin->fname }}">
                                                            @endif
                                                            <div class="ml-2">
                                                                <p class="mb-0"><strong>{{ $admin->fname }}
                                                                        {{ $admin->lname }}
                                                                        @if ($admin->status == 1)
                                                                            <span
                                                                                style="display:inline-block;vertical-align:middle;height: 10px;width:10px;border-radius:100%;background:green"></span>
                                                                        @else
                                                                            <span
                                                                                style="display:inline-block;vertical-align:middle;height: 10px;width:10px;border-radius:50%;background:red"></span>
                                                                        @endif
                                                                        @if ($admin->id == Auth::user()->id)
                                                                            (Me)
                                                                        @endif
                                                                    </strong></p>
                                                                <p class="mb-0">ID: {{ $admin->user_id }}</p>
                                                                <p class="mb-0">Blood: {{ $admin->blood_group }}</p>
                                                                <p class="mb-0">Gender: {{ $admin->gender }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0"><strong>Email:</strong><br> <a
                                                                href="mailto:{{ $admin->email }}">{{ $admin->email }}</a>
                                                        </p>
                                                        <p class="mb-0"><strong>Phone:</strong> <br><a
                                                                href="tel:{{ $admin->email }}">{{ $admin->phone }}</a></p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0"><strong>Present:</strong> <br>
                                                            {{ $admin->current_address }}</p>
                                                        <p class="mb-0"><strong>Parmanent:</strong> <br>
                                                            {{ $admin->parmanent_address }}</p>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.edit.admin', [$admin->id]) }}"
                                                            class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                                        <a target="_blank"
                                                            href="{{ route('admin.preview.admin', [$admin->id]) }}"
                                                            class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>

                                                
                                                                <a
                                                            href="@if ($admin->id == Auth::user()->id) javascript:void() @else {{ route('admin.movetotrash.admin', [$admin->id]) }} @endif"
                                                            class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>


                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row justify-content-center my-2">
                                        {{ $admins->appends($_GET)->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
