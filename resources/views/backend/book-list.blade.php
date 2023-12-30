@extends('backend.inc.main')
@section('title', 'All Teacher')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Book List</h5>
                    </div>
                </div>
            </div>
            <div class="content-page">
                <div class="row">
                    <div class="col-lg-8 col-md-8 ">
                        <div class="card p-3">
                            <h4>Find Book List</h4>
                            <hr class="mt-0">
                            <form action="" method="GET">
                                <div class="form-group">
                                    <label for="">Select Class</label>
                                    <div class="d-flex">
                                        <select name="class" class="form-control rounded-0">
                                            <option value="">Select Class</option>
                                            <option @if ($class == '1') selected @endif value="1">Class 1
                                            </option>
                                            <option @if ($class == '2') selected @endif value="2">Class 2
                                            </option>
                                            <option @if ($class == '3') selected @endif value="3">Class 3
                                            </option>
                                            <option @if ($class == '4') selected @endif value="4">Class 4
                                            </option>
                                            <option @if ($class == '5') selected @endif value="5">Class 5
                                            </option>
                                            <option @if ($class == '6') selected @endif value="6">Class 6
                                            </option>
                                            <option @if ($class == '7') selected @endif value="7">Class 7
                                            </option>
                                            <option @if ($class == '8') selected @endif value="8">Class 8
                                            </option>
                                            <option @if ($class == '9') selected @endif value="9">Class 9
                                            </option>
                                            <option @if ($class == '10') selected @endif value="10">Class
                                                10</option>
                                        </select>
                                        <button type="submit" class="btn btn-info rounded-0"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="result">
                                    @if (count($booklists) > 0)

                                        <table class=" table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20px">#</th>
                                                    <th style="width: 100px">Cover</th>
                                                    <th>Book Name</th>
                                                    <th>PDF</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($booklists as $booklist)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td><img src="{{ asset('booklist/cover') }}/{{ $booklist->book_cover }}"
                                                                alt="" height="100"></td>
                                                        <td>{{ $booklist->book_name }}</td>
                                                        <td>
                                                            @if ($booklist->pdf != '')
                                                                <a href="{{ route('admin.downloadbookpdf', ['id' => $booklist->id]) }}"
                                                                    class="text-danger"><i
                                                                        class="fa fa-3x fa-file-pdf"></i></a>
                                                            @else
                                                                Not Found
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.editbooklist',['id' => $booklist->id]) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                                            <a href="{{ route('admin.deletebooklist',['id' => $booklist->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p class="text-danger text-center">No book list Found!</p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <form action="{{ route('admin.addbooklist') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <h3>Add Book List</h3>
                                <div class="form-group">
                                    <label for="">Select Class</label>
                                    <select name="class" class="form-control">
                                        <option value="">Select Class</option>
                                        <option @if (old('class') == '1') selected @endif value="1">Class 1
                                        </option>
                                        <option @if (old('class') == '2') selected @endif value="2">Class 2
                                        </option>
                                        <option @if (old('class') == '3') selected @endif value="3">Class 3
                                        </option>
                                        <option @if (old('class') == '4') selected @endif value="4">Class 4
                                        </option>
                                        <option @if (old('class') == '5') selected @endif value="5">Class 5
                                        </option>
                                        <option @if (old('class') == '6') selected @endif value="6">Class 6
                                        </option>
                                        <option @if (old('class') == '7') selected @endif value="7">Class 7
                                        </option>
                                        <option @if (old('class') == '8') selected @endif value="8">Class 8
                                        </option>
                                        <option @if (old('class') == '9') selected @endif value="9">Class 9
                                        </option>
                                        <option @if (old('class') == '10') selected @endif value="10">Class 10
                                        </option>
                                    </select>
                                    @error('class')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Book Name</label>
                                    <input type="text" value="{{ old('book_name') }}" class=" form-control"
                                        name="book_name" placeholder="Book Name">
                                    @error('book_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Cover of Book</label>
                                    <input type="file" class=" form-control" name="cover" accept=".jpg,.jpeg,.png">
                                    @error('cover')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Upload PDF Book</label>
                                    <input type="file" class="form-control" name="pdf" accept=".pdf">
                                    @error('pdf')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Add Book</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
