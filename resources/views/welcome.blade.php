@extends('master')
@section('title')
John's Music Project
@stop
@section('content')
<h3>Laravel 5.3 Demo Application</h3>
<p>Main features:</p>
<a href="/bands" class="btn btn-primary">View/Edit Bands</a>
<a href="/albums" class="btn btn-primary">View/Edit Albums</a>
<a href="/bands/create" class="btn btn-primary">Create New Band</a>
<a href="/albums/create" class="btn btn-primary">Create New Album</a>
@stop