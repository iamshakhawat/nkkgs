@extends('studentportal.layout.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3 shadow">
                <div class="card-header">
                    <h3>Apply For Transfer Certificate</h3>

                </div>
                @if ($tcstatus == 0)
                    <form action="{{ route('student.applyfortcPost') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Reason for TC</label>
                            <textarea name="reason" cols="30" class="form-control" rows="3" placeholder="You must clearly state a genuine reason for needing a transfer certificate."></textarea>
                            @error('reason')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="text-muted"><strong>Note:</strong> After appling you can't able to change reason. so be careful</small>
                        </div>
                        <button type="submit" class="btn btn-success">Apply</button>
                    </form>
                    @else
                    <div class="alert alert-warning" role="alert">
                      <h4 class="alert-heading">You are already applied for TC</h4>
                      <p class="mb-0"><a href="{{ route('student.tcstatus') }}">Click Here</a> to see the TC Status that you applied previously</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
