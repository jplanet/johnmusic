@extends('master')
@section('title')
Album List
@stop
@section('content')

    @if (session('status'))    
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    
<table id="album_table">
    <thead>
        <tr>
            <th>Album</th>
            <th>Band</th>
            <th>Label</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($albums as $album) 
        <tr>
            <td>{{ $album->name }}</td>
            <td>{{ $album->band->name }}</td>
            <td>{{ $album->label }}</td>
            <td>{{ $album->genre }}</td>
            <td>
                <a class="btn-success btn" href='/albums/{{$album->id}}/edit'>Edit</a>
                <a onclick="return confirm('Permanently delete album? This cannot be undone.')" href="javascript:delete_resource('albums',{{$album->id}},'{{{ csrf_token()}}}');" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

