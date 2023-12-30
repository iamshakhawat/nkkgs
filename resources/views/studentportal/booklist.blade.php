@extends('studentportal.layout.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3 shadow ">
                <div class="card-header">
                    <h3>Book List of Class {{ Auth::user()->class }}</h3>
                </div>
                <div class=" table-responsive">
                    <table class=" table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 20px">#</th>
                                <th style="width: 120px">Cover</th>
                                <th>Book Name</th>
                                <th>PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($booklists as $booklist)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img style="height: 100px;width:80px" class=" rounded-0" src="{{ asset('booklist/cover') }}/{{ $booklist->book_cover }}"
                                            alt=""></td>
                                    <td>{{ $booklist->book_name }}</td>
                                    <td>
                                        @if ($booklist->pdf != '')
                                            <a href="{{ route('student.downloadbookpdf', ['id' => $booklist->id]) }}"
                                                class="text-danger"><i
                                                    class="fa fa-3x fa-file-pdf"></i></a>
                                        @else
                                            Not Found
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection
