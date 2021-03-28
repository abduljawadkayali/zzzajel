@extends('layouts.Admin')

@section('title', '| Posts')

@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <h1>
                <i class="far fa-edit"></i>
                @lang("Edit Post")
            </h1>
            <hr>
            {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
            <div class="form-group">
                {{ Form::hidden('name', Auth::user()->name, array('class' => 'form-control')) }}<br>



                {{ Form::label('body', __('Post Body')) }}
                {{ Form::textarea('body', $post->body, array('class' => 'form-control')) }}
                <br>
                {{ Form::submit(__('Update'), array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
