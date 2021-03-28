@extends('layouts.Admin')

@section('title', '| Service')

@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <h1>
                <i class="far fa-edit"></i>
                @lang("Edit Service")
            </h1>
            <hr>
            {{ Form::model($data, array('route' => array('service.update', $data->id), 'method' => 'PUT')) }}
            <div class="form-group">
                {{ Form::label('title', __('Title')) }}
                {{ Form::text('title', $data->title, array('class' => 'form-control')) }}<br>



                {{ Form::label('body', __('Body')) }}
                {{ Form::textarea('body', $data->body, array('class' => 'form-control')) }}
                <br>
                {{ Form::submit(__('Update'), array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
