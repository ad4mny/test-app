@extends('layouts.app', ['title' => 'Add Images'])
@section('content')
<div>
    <h1>Images Form</h1>
    <a href="{{ route('list') }}" class="btn-primary">Return to Image List</a>
</div>
<hr>
<div class="card p-3">
    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image">Choose an Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="image">Add Image Description:</label>
            <textarea name="desc" id="desc" cols="30" rows="5" maxlength="100" class="form-control"
                placeholder="Max 100 characters."></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Upload Image</button>
        </div>
    </form>
</div>
@stop