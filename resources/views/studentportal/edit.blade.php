@extends('studentportal.layout.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3 shadow">
                <div class="card-header">
                    <h4>Edit Profile</h4>
                </div>
                <form action="{{ route('student.editPost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="row p-3">
                            <div class="col-md-12">
                                <h3>Genarel Information</h3>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" value="{{ $student->id }}" name="id">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="fname" value="{{ $student->fname }}" class="form-control"
                                        placeholder="First Name">
                                    @error('fname')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lname" class="form-control" value="{{ $student->lname }}"
                                        placeholder="Last Name">
                                    @error('lname')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Student ID</label>
                                    <input type="text" value="{{ $student->user_id }}" name="user_id"
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
                                        <option @if ($student->class == '1') selected @endif value="1">Class 1
                                        </option>
                                        <option @if ($student->class == '2') selected @endif value="2">Class 2
                                        </option>
                                        <option @if ($student->class == '3') selected @endif value="3">Class 3
                                        </option>
                                        <option @if ($student->class == '4') selected @endif value="4">Class 4
                                        </option>
                                        <option @if ($student->class == '5') selected @endif value="5">Class 5
                                        </option>
                                        <option @if ($student->class == '6') selected @endif value="6">Class 6
                                        </option>
                                        <option @if ($student->class == '7') selected @endif value="7">Class 7
                                        </option>
                                        <option @if ($student->class == '8') selected @endif value="8">Class 8
                                        </option>
                                        <option @if ($student->class == '9') selected @endif value="9">Class 9
                                        </option>
                                        <option @if ($student->class == '10') selected @endif value="10">Class 10
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
                                        <option @if ($student->section == 'A') selected @endif value="A">A
                                        </option>
                                        <option @if ($student->section == 'B') selected @endif value="B">B
                                        </option>
                                        <option @if ($student->section == 'C') selected @endif value="C">C
                                        </option>
                                        <option @if ($student->section == 'D') selected @endif value="D">D
                                        </option>
                                        <option @if ($student->section == 'E') selected @endif value="E">E
                                        </option>
                                        <option @if ($student->section == 'F') selected @endif value="F">F
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
                                    <input type="date" name="dob" value="{{ $student->dob }}" class="form-control">
                                    @error('dob')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Roll</label>
                                    <input type="number" name="roll" value="{{ $student->roll }}" class="form-control">
                                    @error('roll')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Shift</label>
                                    <select name="shift" class="form-control">
                                        <option @if ($student->shift == 'Morning') selected @endif value="Morning">Morning
                                        </option>
                                        <option @if ($student->shift == 'Day') selected @endif value="Day">Day
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
                                        <option @if ($student->gender == 'Male') selected @endif value="Male">Male
                                        </option>
                                        <option @if ($student->gender == 'Female') selected @endif value="Female">Female
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
                                        <option @if ($student->religion == 'Islam') selected @endif value="Islam">Islam
                                        </option>
                                        <option @if ($student->religion == 'Hindu') selected @endif value="Hindu">Hindu
                                        </option>
                                        <option @if ($student->religion == 'Buddah') selected @endif value="Buddah">Buddah
                                        </option>
                                        <option @if ($student->religion == 'Christian') selected @endif value="Christian">
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
                                        <option {{ $student->blood_group == 'A+' ? 'selected' : '' }} value="A+">A+
                                        </option>
                                        <option {{ $student->blood_group == 'A-' ? 'selected' : '' }} value="A-">A-
                                        </option>
                                        <option {{ $student->blood_group == 'B+' ? 'selected' : '' }} value="B+">B+
                                        </option>
                                        <option {{ $student->blood_group == 'B-' ? 'selected' : '' }} value="B-">B-
                                        </option>
                                        <option {{ $student->blood_group == 'O+' ? 'selected' : '' }} value="O+">O+
                                        </option>
                                        <option {{ $student->blood_group == 'O-' ? 'selected' : '' }} value="O-">O-
                                        </option>
                                        <option {{ $student->blood_group == 'AB+' ? 'selected' : '' }} value="AB+">AB+
                                        </option>
                                        <option {{ $student->blood_group == 'AB-' ? 'selected' : '' }} value="AB-">AB-
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
                                    <input type="text" name="nationality" value="{{ $student->nationality }}"
                                        class="form-control">
                                    @error('nationality')
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
                                    <input type="text" name="father_name" value="{{ $student->father_name }}"
                                        class="form-control" placeholder="Father's Name">
                                    @error('father_name')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mother's Name</label>
                                    <input type="text" name="mother_name" value="{{ $student->mother_name }}"
                                        class="form-control" placeholder="mother's Name">
                                    @error('mother_name')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Parent's Email</label>
                                    <input type="email" name="parent_email" value="{{ $student->parent_email }}"
                                        class="form-control" placeholder="Parent Email">
                                    @error('parent_email')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Parent's Phone</label>
                                    <input type="text" name="parent_phone" maxlength="11" value="{{ $student->parent_phone }}"
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
                                        value="{{ $student->emergency_contact }}" maxlength="11" class="form-control"
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
                                    <input type="email" name="email" readonly value="{{ $student->email }}"
                                        class="form-control" placeholder="Primary Email">
                                    @error('email')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="number" name="phone" value="{{ $student->phone }}"
                                        class="form-control" placeholder="Phone Number">
                                    @error('phone')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Current Address</label>
                                    <textarea name="current_address" class="form-control">{{ $student->current_address }}</textarea>
                                    @error('current_address')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Parmanent Address</label>
                                    <textarea name="parmanent_address" class="form-control">{{ $student->parmanent_address }}</textarea>
                                    @error('parmanent_address')
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Preview</label>
                                    <div class="d-block">
                                        @if ($student->photo != '')
                                            <img height="100" src="{{ asset('upload/users') }}/{{ $student->photo }}"
                                                alt="">
                                        @else
                                            <img height="100" src="{{ asset('backend') }}/assets/img/user.jpg"
                                                alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <button type="submit" class="btn btn-success mr-2">Save </button>
                        <a href="{{ route('student.profile') }}" class="btn btn-warning">Back</a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection
