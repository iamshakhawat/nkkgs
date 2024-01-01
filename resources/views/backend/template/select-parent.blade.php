<option value="">Select Parent</option>
@foreach ($parents as $parent)
<option @if($id == $parent->set_student) selected @endif value="{{ $parent->id }}">{{ $parent->name }}</option>
@endforeach
