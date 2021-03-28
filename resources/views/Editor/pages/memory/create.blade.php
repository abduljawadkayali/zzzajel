@extends('Editor.Dashbored.Admin')

@section('title', '| Create Permission')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-2">
        <h1><i class="fa fa-edit">@lang(" Update New Memory for Bus")</i></h1>
        <hr>
        </div>
        <div class="col-md-6 col-md-offset-2">
            {{ Form::open(array('route' => 'memory.store')) }}

            <div class="row">
                <div class="col-md-9 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('Busmemory', __('Bus memory')) }}
                        {{ Form::text('Busmemory', null, array('class' => 'form-control')) }}
                    </div>
                </div>



            </div>

            <br>

        </div>



        <div class="col-md-6 col-md-offset-2">



            <div class="row">
                <div class="col-md-9 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('Devicememory', __('Device memory')) }}
                        {{ Form::text('Devicememory', null, array('class' => 'form-control')) }}
                    </div>
                </div>



            </div>
        </div>

            <br>
            <div class="col-md-3 col-md-offset-2">
            </div>
            <div class="col-md-6 col-md-offset-2">
                <div class="form-group">
                    {{ Form::submit(__('update bus memory'), array('class' => 'btn btn-success btn-lg btn-block')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
