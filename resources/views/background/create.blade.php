@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">

        <h1><i class="far fa-image"></i>@lang("Add Background")</h1>

        <div class="row ">

            <div class='col-lg-12 col-lg-offset-4'>
			<hr>
			 {{ Form::open(array('url' => 'background', 'method' => 'POST', 'files' => true))}}
                <div class="row ">

            <div class="col-md-4 col-md-offset-2">
            <div class="form-group">
                @lang("Title")

                {{ Form::text('title', null, array('class' => 'form-control')) }}

            </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                    @lang("Link Title")

                    {{ Form::text('link_title', null, array('class' => 'form-control')) }}

                </div>

            </div>
            <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                    @lang("Link")

                    {{ Form::text('link', null, array('class' => 'form-control')) }}

                </div>
            </div>
                <div class="col-md-6 col-md-offset-2">

            <div class="form-group">
                @lang("Body")

                {{ Form::textarea('body', null, array('class' => 'form-control')) }}

            </div>

            </div>




                <div class="col-md-4 col-md-offset-2">

                    <div class="form-group">
                <br>
            <div class="custom-file">
                <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">@lang("Choose Photo")</label>
            </div>
            </div>
            </div>
                <div class="col-md-4 col-md-offset-2">

                    <div class="form-group">

            {{Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}

              </div>
              </div>
              </div>

        </div>
    </div>

@endsection


