@extends('layouts.main', ['title' => "Main page"])

@section('content')

    @if(isset($original_link) && isset($original_short))
        <p>Original Link: {{$original_link}}</p>
        <p>Short link: {{$original_short}}</p>
    @endisset

    <form action="{{route('storeLink')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="link" id="link" required>
        @if($errors->has('link'))
            <font color="red"><p>  {{$errors->first('link')}}</p></font>
        @endif
        <button type="submit" class="btn btn-primary">Create short Link</button>
    </form>
@endsection