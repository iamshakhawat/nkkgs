@extends('backend.inc.main')
@section('title', 'Notice')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="content-page">
                <div class="row">
                    <div class="col-lg-12 col-md-12 ">
                        <div class="card p-3">
                            <h4>Connect With Student</h4>
                            <hr class="mt-0">

                            <form>
                                <div class="row ">
                                    <div class="col-sm-3 col-md-2">
                                        <div class="form-group">
                                            <select required onchange="shiftChange()" name="shift" id="shift"
                                                class="form-control">
                                                <option value="">Select Shift</option>
                                                <option value="Day">Day
                                                </option>
                                                <option value="Morning">
                                                    Morning</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <select required name="class" onchange="classChange()" id="class"
                                                class="form-control">
                                                <option value="">Select Class</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <select required name="section" onchange="sectionChange()" id="section"
                                                class="form-control">
                                                <option value="">Select Section</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <select required onchange="studentChange()" name="student" id="student"
                                                class="form-control">
                                                <option value="">Select Student</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <select required name="parent" onchange="parentChange()" id="parent" class="form-control">
                                                <option value="">Select Parent</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-12 " id="upbutton">
                                        
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-md-3">
                                                <button type="submit" disabled id="addBtn" class="btn btn-success w-100"><i class="fa fa-link"></i>  Bind </button>
                                            </div> 
                                        </div>


                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 " id="resultDiv">
                        
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
        function shiftChange() {
            if ($("#shift").val() != "") {
                $.ajax({
                    type: "POST",
                    url: "{{ route('selectStudentforConnect') }}",
                    data: {
                        shift: $("#shift").val(),
                        action: 'shift',
                    },
                    success: function(response) {
                        $("#class").html(response);
                    }
                });
            } else {
                $("#class").html('<option value="">Select Class</option>');
            }
        }

        function classChange() {
            if ($("#class").val() != "") {
                $.ajax({
                    type: "POST",
                    url: "{{ route('selectStudentforConnect') }}",
                    data: {
                        shift: $("#shift").val(),
                        action: 'class',
                    },
                    success: function(response) {
                        $("#section").html(response);
                    }
                });
            } else {
                $("#section").html('<option value="">Select Section</option>');
            }
        }

        function sectionChange() {
            if ($("#section").val() != "") {
                $.ajax({
                    type: "POST",
                    url: "{{ route('selectStudentforConnect') }}",
                    data: {
                        shift: $("#shift").val(),
                        class: $("#class").val(),
                        section: $("#section").val(),
                        action: 'section',
                    },
                    success: function(response) {
                        $("#student").html(response)
                    }
                });

            } else {
                $("#student").html('<option value="">Select Student</option>');
            }
        }

        function studentChange() {
            if ($("#student").val() != "") {
                $.ajax({
                    type: "POST",
                    url: "{{ route('selectStudentforConnect') }}",
                    data: {
                        student: $("#student").val(),
                        action: 'student',
                    },
                    success: function(response) {
                        $("#parent").html(response)
                    }
                });

            } else {
                $("#parent").html('<option value="">Select Parent</option>');
            }
        }
        function parentChange() {
            if ($("#parent").val() != "") {
                $("#addBtn").prop('disabled',false);
            }else{
                $("#addBtn").prop('disabled',true);
            }
        }

        $("#addBtn").click(function(e){
            e.preventDefault();
            $("#addBtn").prop('disabled',true);
            $.ajax({
                type: "POST",
                url: "{{ route('selectStudentforConnect') }}",
                data: {
                    student: $("#student").val(),
                    parent: $("#parent").val(),
                },
                success: function (response) {
                    $("#addBtn").prop('disabled',false);
                    $("#resultDiv").html(response)
                    toastr["success"]("Student & Parent Bind successful");
                }
            });
        });

    </script>

@endsection
