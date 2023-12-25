@foreach(File::glob(public_path('upload/users').'/*') as $path)
    <div class="">
        <img height="100" src="{{ str_replace(public_path(), '', $path) }}">
        <p>{{ substr($path,42,100) }}</p>
    </div>
@endforeach