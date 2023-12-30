@extends('backend.inc.main')
@section('title', 'All Teacher')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row justify-content-between">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Book List</h5>
                    </div>
                    <a href="{{ route('admin.booklist') }}" class="btn btn-info text-white">All Book List</a>
                </div>
            </div>
            <div class="content-page">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-3">
                            <form action="{{ route('admin.editbooklistPost') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $booklist->id }}">
                                <h3>Edit Book List</h3>
                                <div class="form-group">
                                    <label for="">Select Class</label>
                                    <select name="class" class="form-control">
                                        <option @if ($booklist->class == '1') selected @endif value="1">Class 1
                                        </option>
                                        <option @if ($booklist->class == '2') selected @endif value="2">Class 2
                                        </option>
                                        <option @if ($booklist->class == '3') selected @endif value="3">Class 3
                                        </option>
                                        <option @if ($booklist->class == '4') selected @endif value="4">Class 4
                                        </option>
                                        <option @if ($booklist->class == '5') selected @endif value="5">Class 5
                                        </option>
                                        <option @if ($booklist->class == '6') selected @endif value="6">Class 6
                                        </option>
                                        <option @if ($booklist->class == '7') selected @endif value="7">Class 7
                                        </option>
                                        <option @if ($booklist->class == '8') selected @endif value="8">Class 8
                                        </option>
                                        <option @if ($booklist->class == '9') selected @endif value="9">Class 9
                                        </option>
                                        <option @if ($booklist->class == '10') selected @endif value="10">Class 10
                                        </option>
                                    </select>
                                    @error('class')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Book Name</label>
                                    <input type="text" value="{{ $booklist->book_name }}" class=" form-control"
                                        name="book_name" placeholder="Book Name">
                                    @error('book_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="form-group">
                                        <label for="">Cover of Book</label>
                                        <input type="file" class=" form-control" name="cover" accept=".jpg,.jpeg,.png">
                                        @error('cover')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <img height="100" src="{{ asset('booklist/cover/') }}/{{ $booklist->book_cover }}"
                                        class="" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="">Upload PDF Book</label>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <input type="file" class="form-control" name="pdf" accept=".pdf">
                                        @if ($booklist->pdf != '')
                                            <div class="ml-2"><i class="fa fa-file-pdf fa-2x"></i></div>
                                        @endif
                                    </div>
                                    @error('pdf')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
