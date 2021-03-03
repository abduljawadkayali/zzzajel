@extends('Editor.Dashbored.Admin')

@section('title', '| Create Permission')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-2">

            <h1><i class="fa fa-plus">@lang(" Create New Device Account")</i></h1>
            <hr>

            {{-- Using the Laravel HTML Form Collective to create our form --}}
            {{ Form::open(array('route' => 'device.store')) }}

            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('SalerName', __('Saler Name')) }}
                        {{ Form::text('SalerName', null, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('DeviceNumber', __('Device Number')) }}
                        {{ Form::text('DeviceNumber', null, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('Adres', __('Adres')) }}
                        {{ Form::text('Adres', null, array('class' => 'form-control')) }}
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('SalerPhone', __('Saler Phone')) }}
                        {{ Form::text('SalerPhone', null, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('password', __('password')) }}
                        {{ Form::password('password', array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('password', __('Confirm Password')) }}<br>
                        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                    {{ Form::label('WifiName', __('Wifi Name')) }}<br>
                    {{ Form::text('WifiName', null, array('class' => 'form-control')) }}

                </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('WifiPass', __('Wifi Pass')) }}<br>
                        {{ Form::text('WifiPass', null, array('class' => 'form-control')) }}

                    </div>
                </div>





            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <br>
                    {{ Form::label('Status', __('Status')) }}
                    <input type="checkbox" name="status" checked data-bootstrap-switch data-off-color="danger"
                           data-on-color="success">
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::hidden('MemoryAdres', 25, array('class' => 'form-control')) }}
                    </div>
                </div>


            </div>
            <br>
            <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                    {{ Form::submit(__('Create Device Account'), array('class' => 'btn btn-success btn-lg btn-block')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
