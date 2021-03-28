@extends('layouts.Admin')

@section('title', '| Posts')

@section('content')

    <div class="container">

        <h1>@lang("Author")  : {{ $data->name }}</h1>
        <h1>@lang("Author phone")  : {{ $data->phone }}</h1>
        <h1>@lang("Message Subject")  : {{ $data->subject }}</h1>
        <hr>
        @lang("Message")
        <h1>{{ $data->message }}</h1>
        <hr>

        <a href="{{ url()->previous() }}" class="btn btn-primary">@lang("Back")</a>


    </div>

@endsection
