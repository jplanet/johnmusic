@extends('master')
@section('title')
Band List
@stop
@section('content')

    @if (session('status'))    
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    
<table id="band_table">
    <thead>
        <tr>
            <th>Band</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bands as $band) 
        <tr>
            <td>{{ $band->name }}</td>
            <td>
                <a href="{{ $band->website }}" target="_blank">{{ $band->website }}</a>
            </td>
            <td>
                <a class="btn-success btn" href='/bands/{{$band->id}}/edit'>Edit</a>
                <a onclick="return confirm('Permanently delete band and all of its albums? This cannot be undone.')" href="javascript:delete_resource('bands',{{$band->id}},'{{{ csrf_token()}}}');" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
