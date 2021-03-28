@extends('layouts.Admin')


@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-2">
        <h1><i class="fas fa-language">  @lang("Translate")</i></h1>
        <hr>
        </div>
    </div>
        <div class="row">
            {{-- Using the Laravel HTML Form Collective to create our form --}}


            <div class="col-md-4 col-md-offset-2">
            {{ Form::open(array('route' => 'en.store')) }}
            <div class="form-group">
                {{ Form::label('name', __('Orginal Text')) }}
                {{ Form::textarea('orginal', null, array('class' => 'form-control')) }}
                <br>
            </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
            </div>
                <div class="col-md-4 col-md-offset-2">

                {{ Form::label('name', __('Arabic')) }}
                {{ Form::textarea('ar', null, array('class' => 'form-control')) }}
                <br>
                </div>
                <div class="col-md-4 col-md-offset-2">
                {{ Form::label('name', __('English')) }}
                {{ Form::textarea('en', null, array('class' => 'form-control')) }}
                <br>
                </div>
                <div class="col-md-4 col-md-offset-2">
                {{ Form::label('name', __('turkish')) }}
                {{ Form::textarea('tr', null, array('class' => 'form-control')) }}
                <br>

                </div>
                {{ Form::submit(__('Translate'), array('class' => 'btn btn-success btn-lg btn-block')) }}
                {{ Form::close() }}
            </div>
            </div>

@endsection
