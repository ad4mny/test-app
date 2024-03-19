@extends('layouts.app', ['title' => 'Add Images'])
@section('content')
<div>
    <h1>Images List</h1>
    <a href="{{ route('add') }}">Add Images</a>
</div>
<hr>
<div class="card">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($images as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td><img src="{{ asset($item->path) }}" alt="" width="50" height="50"></td>
                <td>{{$item->name}}</td>
                <td>{{$item->desc}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop