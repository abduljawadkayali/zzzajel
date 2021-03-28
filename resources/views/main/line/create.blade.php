@extends('layouts.Admin')

@section('header')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row ">

            <div class='col-lg-12 col-lg-offset-4'>
                @if ($errors->any())

                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger in">
                            {{ __($error) }}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row ">

            <div class='col-lg-12 col-lg-offset-4'>

                <h1><i class='fa fa-user-plus'></i> @lang("Add Line")</h1>
                <hr>
                {{ Form::open(array('url' => 'line', 'method' => 'POST', 'files' => true))}}
                <div class="row ">
                <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                    {{ Form::label('name', __('Line')) }}
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div>
                </div>
                    <div class="col-md-4 col-md-offset-2">

                        <div class="form-group">
                            <label for="jorney_id">@lang("jorney ")</label>
                            <select name="jorney_id" class="form-control">
                                <option value="">@lang("--- Select jorney ---")</option>

                                @foreach ($jorneys as $key => $value)

                                    <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                    {{ Form::label('price', __('price')) }}
                    {{ Form::text('price', '', array('class' => 'form-control')) }}
                </div>
                </div>
                <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{ Form::label('duration', __('duration')) }}
                    {{ Form::text('duration', '', array('class' => 'form-control')) }}
                </div>
                </div>
                    <div class="col-md-4 col-md-offset-2">
                        <br>
                        {{ Form::label('Status', __('Status')) }}
                        <input type="checkbox" name="status" checked data-bootstrap-switch data-off-color="danger"
                               data-on-color="success">
                    </div>
                <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{ Form::label('startingTime', __('startingTime')) }}
                    {{ Form::text('startingTime', '', array('class' => 'form-control')) }}
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
                    </div>


                <div class="col-md-4 col-md-offset-2">

                {{ Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
                <br>

            </div>
            </div>
        </div>
    </div>

@endsection
