@extends('master')
{{-- Conditional statements allow for reuse as both edit and create form --}}
@section('title')
    @if(isset($album))
        Editing: {{$album->name}}
    @else
        Add New Album
    @endif
@stop

@section('content')
    @if(isset($album))
        {!! Form::model($album, array('route' => array('albums.update', $album->id),'method'=>'put','id'=>'albumform','class'=>'form-horizontal')) !!}
    @else
        {!! Form::open(['route' => 'albums.store','method'=>'post','id'=>'albumform','class'=>'form-horizontal']) !!}
    @endif
<fieldset>
    <div class="form-group">
        <label class="col-md-4 control-label" for="name">Album Name</label>  
        <div class="col-md-4">
            {!! Form::text('name',Input::old('name'),array('class'=>'form-control input-md')) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="recorded_date">Date Recorded</label>  
        <div class="col-md-4">
            @if(isset($album))
            {!! Form::text('recorded_date',date('m/d/Y',strtotime($album->recorded_date)),array('class'=>'form-control input-md datepicker','id'=>'recorded_date')) !!}
            @else 
            {!! Form::text('recorded_date','',array('class'=>'form-control input-md datepicker','id'=>'recorded_date')) !!}
            @endif
            <span class="help-block">Date recording of album completed</span>  
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="release_date">Date Released</label>  
        <div class="col-md-4">
            @if(isset($album))
            {!! Form::text('release_date',date('m/d/Y',strtotime($album->release_date)),array('class'=>'form-control input-md datepicker','id'=>'release_date')) !!}
            @else  
            {!! Form::text('release_date','',array('class'=>'form-control input-md datepicker','id'=>'release_date')) !!}
            @endif
            <span class="help-block">Album's official release date</span>  
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="number_of_tracks"># of Tracks</label>  
        <div class="col-md-4">
            {!! Form::text('number_of_tracks',Input::old('number_of_tracks'),array('class'=>'form-control input-md')) !!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="label">Label</label>  
        <div class="col-md-4">
            {!! Form::text('label',Input::old('label'),array('class'=>'form-control input-md')) !!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="producer">Producer</label>  
        <div class="col-md-4">
            {!! Form::text('producer',Input::old('producer'),array('class'=>'form-control input-md')) !!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="genre">Genre</label>  
        <div class="col-md-4">
            {!! Form::text('genre',Input::old('genre'),array('class'=>'form-control input-md')) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="band">Band</label>
        <select name="band_id" id="band_id" class="custom-select input-md">
            <option value="">Select Band...</option>
            @foreach ($bands as $band) 
            <option value="{{$band->id}}">{{$band->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group submitgroup">
        <input type="submit" class="btn btn-info" value="Save">
    </div>
</fieldset>
{!! Form::close() !!}
@stop
@if(isset($album))
@section('customjs')
<script>
    $('#band_id').val({{$album->band->id}});
</script>
@stop
@endif