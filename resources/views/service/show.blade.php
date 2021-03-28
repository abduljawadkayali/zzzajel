@extends('layouts.Admin')

@section('title', '| Posts')

@section('content')

    <div class="container">

        <h1>@lang("Service title")  : {{ $data->title }}</h1>
        <hr>
        @lang("Body")
        <p class="lead">{{ $data->body }} </p>
        <hr>
        {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $data->id] ]) !!}
        <a href="{{ url()->previous() }}" class="btn btn-primary">@lang("Back")</a>

        {!! Form::close() !!}

    </div>

@endsection
