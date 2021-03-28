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

            <div class='col-lg-6 col-lg-offset-4'>
        <h1><i class='fa fa-user-plus'></i> @lang("Add User")</h1>
        <hr>
        {{ Form::open(array('url' => 'users')) }}

        <div class="form-group">
            {{ Form::label('name', __('Name')) }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', __('Email')) }}
            {{ Form::email('email', '', array('class' => 'form-control')) }}
        </div>

        <div class='form-group'>
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

            @endforeach
        </div>

        <div class="form-group">
            {{ Form::label('password', __('Password')) }}<br>
            {{ Form::password('password', array('class' => 'form-control')) }}

        </div>

        <div class="form-group">
            {{ Form::label('password', __('Confirm Password')) }}<br>
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

        </div>

        {{ Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
        <br>

    </div>
        </div>
    </div>

@endsection
