@extends('layouts.Admin')

@section('title', '| Create Permission')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-2">

            <h1><i class="fa fa-plus">@lang(" Create New Journey")</i></h1>
            <hr>

            {{-- Using the Laravel HTML Form Collective to create our form --}}
            {{ Form::open(array('route' => 'journey.store')) }}

            <div class="row">
                <div class="col-md-6 col-md-offset-2">
            <div class="form-group">
                {{ Form::label('name', __('Journey Name')) }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
                </div>
                <div class="col-md-6 col-md-offset-2">
                    <div class="form-group">
                {{ Form::label('lan', __('lan')) }}
                {{ Form::text('lan', null, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-12 col-md-offset-2">
                    <div class="form-group">
                {{ Form::label('adres', __('adres')) }}
                {{ Form::textarea('adres', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                {{ Form::submit(__('Create Joruney'), array('class' => 'btn btn-success btn-lg btn-block')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
