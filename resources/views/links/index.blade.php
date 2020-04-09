@extends('layouts.main', ['title' => "Main page"])

@section('content')
    <script type="text/javascript" src="<?php echo asset('js/copytext.js')?>"></script>
    @if(isset($original_link) && isset($original_short))
        <p><b>Original Link:<a href="{{$original_link}}"> {{$original_link}} </a></b></p>
        <p><b>Short link:</b><input type="text" id="shortLink" value="{{$original_short}}" readonly>
            <input type="button" class="btn btn-primary" value="Copy link" onclick='copyText("shortLink")'>
        </p>
    @endisset
    <br><br>

    <b>Create short link:</b>
    <form action="{{route('storeLink')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="link">Input link:</label>
            <input type="text" name="link" id="link" required>
            @if($errors->has('link'))
                <font color="red"><p><b> {{$errors->first('link')}}</b></p></font>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Create short Link</button>
    </form>
@endsection