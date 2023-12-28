<!doctype html>
<html lang="en">

<head>
    <title>Forget Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/toastr.min.css">
    <script src="{{ asset('backend') }}/assets/js/toastr.min.js"></script>

</head>

<body>
    <div class="container">

        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">

                        <div class="text-center">
                            <h4>Forget Password</h4>
                            <hr>
                        </div>



                        <form action="{{ route('reset.password') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Email Address<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter your email address"> 

                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @if (Session::has('icon') || Session::has('messege'))
                                        <span class=" @if(Session::get('icon') == 'error')text-danger @else text-success @endif">{{ Session::get('messege') }}</span>
                                            <script>
                                                toastr["{{ Session::get('icon') }}"]("{{ Session::get('messege') }}");
                                            </script>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-block m-auto text-center">
                                    <button type="submit" class="btn btn-primary mb-2">Reset Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
