@extends('studentportal.layout.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3 shadow ">
                <div class="card-header">
                    <h3>Transfer Certificate Applicaiton Status</h3>

                </div>
                @if ($tcstatus == 1)
                    <style>
                        table {
                            text-align: center
                        }

                        th:nth-child(1) {
                            width: 200px;
                        }

                        th:nth-child(5) {
                            width: 100px;
                        }

                        td,
                        th {
                            border: 1px solid #ccc;
                            padding: 10px
                        }
                    </style>
                    <table>
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Class</th>
                                <th>Reason</th>
                                <th>Status</th>
                                @if ($tc->confirmation == 1)
                                    <th>Download</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{ Auth::user()->roll }}</td>
                                <td>{{ Auth::user()->class }}</td>
                                <td>{{ $tc->reason }}</td>
                                <td>
                                    @if ($tc->confirmation == 0)
                                        <span class="badge badge-pill badge-warning">Processing</span>
                                    @elseif ($tc->confirmation == 1)
                                        <span class="badge badge-pill badge-success">Approve</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">Decline</span>
                                    @endif
                                </td>
                                @if ($tc->confirmation == 1)
                                    <td><a href="{{ route('student.tcdownload',['id' => $tc->tc_id]) }}"><i class="fa fa-download"></i></a></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                    @if ($tc->confirmation == 1)
                        <div class="my-3">
                            <p class="text-success"><strong class="text-black">Note:</strong> Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Laboriosam, voluptatibus?</p>
                        </div>
                    @elseif ($tc->confirmation > 1)
                        <div class="my-3">
                            <p class="text-danger"><strong class="text-black">Note:</strong> Lorem ipsum dolor sit amet
                                consectetur adipisicing elit</p>
                        </div>
                    @endif
                @else
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">No Application Found</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
