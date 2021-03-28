@extends('Editor.Dashbored.Admin')

@section('title', '| Create Permission')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-2">

            <h1><i class="fa fa-plus">@lang(" Create New student Balance")</i></h1>
            <hr>


            {{-- Using the Laravel HTML Form Collective to create our form --}}
            {{ Form::open(array('route' => 'StudentBalance.store')) }}

            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('monthNumber', __('monthNumber')) }}
                        {{ Form::text('monthNumber', null, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('balance', __('balance')) }}
                        {{ Form::text('balance', null, array('class' => 'form-control')) }}
                    </div>
                </div>


            </div>



            <br>
            <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                    {{ Form::submit(__('Create Student Balance'), array('class' => 'btn btn-success btn-lg btn-block')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
