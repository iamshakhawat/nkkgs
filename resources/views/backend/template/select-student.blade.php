<option value="">Select Student</option>
@foreach ($students as $student)
<option value="{{ $student->id }}">{{ $student->name }}-{{ $student->roll }}</option>
@endforeach
