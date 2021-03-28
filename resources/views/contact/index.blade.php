@extends('layouts.Admin')

@section('title', '| Contact')

@section('content')

<div class="col-lg-12 col-lg-offset-1">
    <h1><i class="fas fa-envelope"></i>
    @lang("Messages")
</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>@lang("name")</th>
                    <th>@lang("subject")</th>
                    <th>@lang("phone")</th>
                    <th>@lang("message")</th>
                    <th>@lang("Operations")</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->subject }}</td>
                    <td>{{ $row->phone }}</td>
                      <td>{{ \Illuminate\Support\Str::limit($row->message, 50, '...') }}</td>
                    <td>


                    {!! Form::open(['method' => 'DELETE', 'route' => ['contact.destroy', $row->id] ]) !!}

                       <a href="{{ route('contact.show', $row->id ) }}" class="btn btn-warning pull-left" style="margin-right: 3px;">@lang("Show")</a>

                    {!! Form::submit(__('Delete'), ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
