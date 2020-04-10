@extends('layouts.app')

@section('content')
<form action="{{ route('users.image', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
         <p>画像</p>
    <label>
        <span class="fa fa-file-image"></span>
        <input type="file" style="display:none" name="thefile">
    </label>
<input type="submit">
</form>

@endsection