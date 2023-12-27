@extends('backend.inc.main')
@section('title', 'Add Student')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Add Student</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                                    Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.all.student') }}">Students</a></li>
                            <li class="breadcrumb-item" id="ok"><span>Add Student</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <form action="{{ route('admin.insert.student') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="row p-3">
                            <div class="col-md-12">
                                <h3>Genarel Information</h3>
                                    @if($errors->any())
                                        @foreach ($errors->all() as $error)
                                        <script>
                                            toastr["error"]("{{ $error }}");
                                        </script>
                                        @endforeach
                                    @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="fname" value="{{ old('fname') }}" class="form-control"
                                        placeholder="First Name">
                                    @error('fname')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lname" class="form-control" value="{{ old('lname') }}"
                                        placeholder="Last Name">
                                    @error('lname')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Student ID</label>
                                    <input type="text" value="{{ old('user_id') }}" name="user_id"
                                        class="form-control" placeholder="Student ID">
                                    @error('user_id')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Class</label>
                                    <select name="class" class="form-control">
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
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Section</label>
                                    <select name="section" class="form-control">
                                        <option @if (old('section') == 'A') selected @endif value="A">A
                                        </option>
                                        <option @if (old('section') == 'B') selected @endif value="B">B
                                        </option>
                                        <option @if (old('section') == 'C') selected @endif value="C">C
                                        </option>
                                        <option @if (old('section') == 'D') selected @endif value="D">D
                                        </option>
                                        <option @if (old('section') == 'E') selected @endif value="E">E
                                        </option>
                                        <option @if (old('section') == 'F') selected @endif value="F">F
                                        </option>
                                    </select>
                                    @error('section')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date of Birth</label>
                                    <input type="date" name="dob" value="{{ old('dob') }}" class="form-control">
                                    @error('dob')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Roll</label>
                                    <input type="number" name="roll" value="{{ old('roll') }}" class="form-control">
                                    @error('roll')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Shift</label>
                                    <select name="shift" class="form-control">
                                        <option @if (old('shift') == 'Morning') selected @endif value="Morning">Morning
                                        </option>
                                        <option @if (old('shift') == 'Day') selected @endif value="Day">Day
                                        </option>
                                    </select>
                                    @error('shift')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" class="form-control">
                                        <option @if (old('gender') == 'Male') selected @endif value="Male">Male
                                        </option>
                                        <option @if (old('gender') == 'Female') selected @endif value="Female">Female
                                        </option>
                                    </select>
                                    @error('gender')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Religion</label>
                                    <select name="religion" class="form-control">
                                        <option @if (old('religion') == 'Islam') selected @endif value="Islam">Islam
                                        </option>
                                        <option @if (old('religion') == 'Hindu') selected @endif value="Hindu">Hindu
                                        </option>
                                        <option @if (old('religion') == 'Buddah') selected @endif value="Buddah">Buddah
                                        </option>
                                        <option @if (old('religion') == 'Christian') selected @endif value="Christian">
                                            Christian
                                        </option>
                                    </select>
                                    @error('religion')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Blood Group</label>
                                    <select class="form-control" name="blood">
                                        <option {{ old('blood') == 'A+' ? 'selected' : '' }} value="A+">A+
                                        </option>
                                        <option {{ old('blood') == 'A-' ? 'selected' : '' }} value="A-">A-
                                        </option>
                                        <option {{ old('blood') == 'B+' ? 'selected' : '' }} value="B+">B+
                                        </option>
                                        <option {{ old('blood') == 'B-' ? 'selected' : '' }} value="B-">B-
                                        </option>
                                        <option {{ old('blood') == 'O+' ? 'selected' : '' }} value="O+">O+
                                        </option>
                                        <option {{ old('blood') == 'O-' ? 'selected' : '' }} value="O-">O-
                                        </option>
                                        <option {{ old('blood') == 'AB+' ? 'selected' : '' }} value="AB+">AB+
                                        </option>
                                        <option {{ old('blood') == 'AB-' ? 'selected' : '' }} value="AB-">AB-
                                        </option>
                                    </select>
                                    @error('blood')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nationality</label>
                                    <input type="text" name="nationality" value="{{ old('nationality') }}"
                                        class="form-control">
                                    @error('nationality')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Current Address</label>
                                    <textarea name="current_address" class="form-control">{{ old('current_address') }}</textarea>
                                    @error('current_address')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Parmanent Address</label>
                                    <textarea name="parmanent_address" class="form-control">{{ old('parmanent_address') }}</textarea>
                                    @error('parmanent_address')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="card">
                        <div class="row p-3">
                            <div class="col-md-12">
                                <h3>Parent Information</h3>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Father's Name</label>
                                    <input type="text" name="father_name" value="{{ old('father_name') }}"
                                        class="form-control" placeholder="Father's Name">
                                    @error('father_name')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mother's Name</label>
                                    <input type="text" name="mother_name" value="{{ old('mother_name') }}"
                                        class="form-control" placeholder="mother's Name">
                                    @error('mother_name')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Parent's Email</label>
                                    <input type="email" name="parent_email" value="{{ old('parent_email') }}"
                                        class="form-control" placeholder="Parent Email">
                                    @error('parent_email')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Parent's Phone</label>
                                    <input type="text" name="parent_phone" maxlength="11" value="{{ old('parent_phone') }}"
                                        class="form-control" placeholder="Parent phone">
                                    @error('parent_phone')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Emergency Contact</label>
                                    <input type="text" name="emergency_contact"
                                        value="{{ old('emergency_contact') }}" maxlength="11" class="form-control"
                                        placeholder="Emergency Contact">
                                    @error('emergency_contact')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="row p-3">
                            <div class="col-md-12">
                                <h3>Other Information</h3>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Primary Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control" placeholder="Primary Email">
                                    @error('email')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="number" name="phone" value="{{ old('phone') }}"
                                        class="form-control" placeholder="Phone Number">
                                    @error('phone')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" 
                                        class="form-control" placeholder="Password">
                                    @error('password')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="confirm_password" 
                                        class="form-control" placeholder="Confirm password">
                                    @error('confirm_password')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Photo</label>
                                    <input type="file" name="photo" accept=".jpg,.png,.jpeg" class="form-control">
                                    @error('photo')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <button type="submit" class="btn btn-success mr-2">Add Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
