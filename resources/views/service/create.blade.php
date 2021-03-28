@extends('layouts.Admin')

@section('title', '| Create Service')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1><i class="fa fa-plus">@lang(" Create New Service")</i></h1>
            <hr>

            {{-- Using the Laravel HTML Form Collective to create our form --}}
            {{ Form::open(array('route' => 'service.store')) }}



            <div class="form-group">
                {{ Form::label('name', __('Title')) }}
                {{ Form::text('title', null, array('class' => 'form-control')) }}
                <br>


                {{ Form::label('body', __('Body')) }}
                {{ Form::textarea('body', null, array('class' => 'form-control')) }}
                <br>

                {{ Form::submit(__('Create Service'), array('class' => 'btn btn-success btn-lg btn-block')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
