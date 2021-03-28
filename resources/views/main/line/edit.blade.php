@extends('layouts.Admin')

@section('title', '| Posts')

@section('content')
    @if (count($errors) > 0)

        @foreach ($errors->all() as $error)
            @php
                toast(__(   $error  ),'error');
            @endphp

        @endforeach


    @endif
    <div class="row">

        <div class="col-md-12 col-md-offset-2">
            <h1>
                <i class="far fa-edit"></i>
                @lang("Edit Line")
            </h1>
            <hr>
            {{ Form::model($line, array('route' => array('line.update', $line->id), 'method' => 'PUT')) }}

            <div class="row ">
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('name', __('Line')) }}
                        {{ Form::text('name',  $line->name, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">

                    <div class="form-group">
                        <label for="jorney_id">@lang("jorney ")</label>
                        <select name="jorney_id" class="form-control">
                            <option value="{{$line->jorney->id}}">{{$line->jorney->name}}</option>

                            @foreach ($jorneys as $key => $value)

                                <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('price', __('price')) }}
                        {{ Form::text('price', $line->price, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('duration', __('duration')) }}
                        {{ Form::text('duration', $line->duration, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <br>
                    {{ Form::label('Status', __('Status')) }}

                    <input {{  ($line->status == 'on' ? ' checked' : '') }} type="checkbox" name="status"
                           data-bootstrap-switch data-off-color="danger"
                           data-on-color="success">
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('startingTime', __('startingTime')) }}
                        {{ Form::text('startingTime', $line->startingTime, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                </div>
                <div class="col-md-4 col-md-offset-2">

                    <div class="form-group">
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">@lang("Choose Photo")</label>
                        </div>

                        <input type="hidden" name="hidden_image" value="{{ $line->image }}" />
                    </div>


                    <div class="col-md-4 col-md-offset-2">

                        {{ Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
