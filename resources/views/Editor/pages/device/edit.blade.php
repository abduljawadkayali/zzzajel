@extends('Editor.Dashbored.Admin')

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
                @lang("Edit Device")
            </h1>
            <hr>
            {{ Form::model($data, array('route' => array('device.update', $data->id), 'method' => 'PUT')) }}
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('SalerName', __('Saler Name')) }}
                        {{ Form::text('SalerName', $data->SalerName, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('DeviceNumber', __('Device Number')) }}
                        {{ Form::text('DeviceNumber', $data->DeviceNumber, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('Adres', __('Adres')) }}
                        {{ Form::text('Adres', $data->Adres, array('class' => 'form-control')) }}
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('SalerPhone', __('Saler Phone')) }}
                        {{ Form::text('SalerPhone', $data->SalerPhone, array('class' => 'form-control')) }}
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
                            {{ Form::label('WifiName', __('Wifi Name')) }}
                            {{ Form::text('WifiName', $data->WifiName, array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="col-md-4 col-md-offset-2">
                        <div class="form-group">
                            {{ Form::label('WifiPass', __('Wifi Pass')) }}
                            {{ Form::text('WifiPass', $data->WifiPass, array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="col-md-4 col-md-offset-2">
                        <div class="form-group">
                            {{ Form::label('MemoryAdres', __('Memory Adres')) }}
                            {{ Form::text('MemoryAdres', $data->MemoryAdres, array('class' => 'form-control')) }}
                        </div>
                    </div>

            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <br>
                    {{ Form::label('Status', __('Status')) }}

                    <input {{  ($data->status == 'on' ? ' checked' : '') }} type="checkbox" name="status"
                           data-bootstrap-switch data-off-color="danger"
                           data-on-color="success">
                </div>



            </div>
            <br>
            <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                    {{ Form::submit(__('Create Bus Account'), array('class' => 'btn btn-success btn-lg btn-block')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
