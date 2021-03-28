@extends('layouts.Admin')

@section('title', '| Posts')

@section('content')

    <div class="row">

        <div class="col-md-12 col-md-offset-2">
            <h1>
                <i class="far fa-edit"></i>
                @lang("Edit journey")
            </h1>
            <hr>
            {{ Form::model($journey, array('route' => array('journey.update', $journey->id), 'method' => 'PUT')) }}


            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('name', __('Journey Name')) }}
                        {{ Form::text('name', $journey->name, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('lan', __('lan')) }}
                        {{ Form::text('lan', $journey->lan, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-12 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('adres', __('adres')) }}
                        {{ Form::textarea('adres', $journey->adres, array('class' => 'form-control')) }}
                    </div>
                </div>
                {{ Form::submit(__('update Joruney'), array('class' => 'btn btn-success btn-lg btn-block')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
