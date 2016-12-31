@extends('master')
{{-- Conditional statements allow for reuse as both edit and create form --}}
@section('title')
    @if(isset($band))
        Editing: {{$band->name}}
    @else
        Add New Band
    @endif
@stop

@section('content')
    @if(isset($band))
        {!! Form::model($band, array('route' => array('bands.update', $band->id),'method'=>'put','class'=>'form-horizontal','id'=>'bandform')) !!}
    @else
        {!! Form::open(['route' => 'bands.store','method'=>'post','id'=>'bandform','class'=>'form-horizontal']) !!}
    @endif
<fieldset>
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Band Name</label>  
        <div class="col-md-4">
            {!! Form::text('name',Input::old('name'),array('class'=>'form-control input-md')) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="start_date">Date Started</label>  
        <div class="col-md-4">
            @if(isset($band))
            {!! Form::text('start_date',date('m/d/Y',strtotime($band->start_date)),array('class'=>'form-control input-md datepicker','id'=>'start_date')) !!}
            @else
            {!! Form::text('start_date','',array('class'=>'form-control input-md datepicker','id'=>'start_date')) !!}
            @endif
            <span class="help-block">Known date that band officially formed</span>  
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="website">Website</label>  
        <div class="col-md-4">
            {!! Form::text('website',Input::old('website'),array('class'=>'form-control input-md')) !!}
            <span class="help-block">URL of official band website</span>  
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="still_active">Still Active?</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    {!! Form::hidden('still_active', false) !!}
                    {!! Form::checkbox('still_active',1,Input::old('still_active'),array('class'=>'')) !!}
                </label>
            </div>
        </div>
    </div>
    @if(isset($band))
    <div class="form-group">
        <label class="col-md-4 control-label" for="album_list">Albums</label>
        <div id="band_list">
            @foreach ($band->albums as $album) 
            <p>{{$album->name}}</p>
            @endforeach
        </div>
    </div>
    @endif
    <div class="form-group submitgroup">
        <input type="submit" class="btn btn-info" value="Save">
    </div>

</fieldset>
{!! Form::close() !!}
@stop