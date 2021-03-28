@extends('layouts.Admin')

@section('title', '| Posts')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-newspaper"></i>
    @lang("Services")
</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>@lang("title")</th>
                    <th>@lang("Body")</th>
                    <th>@lang("Operations")</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <td>{{ $row->title }}</td>
                      <td>{{ \Illuminate\Support\Str::limit($row->body, 50, '...') }}</td>
                    <td>


                    {!! Form::open(['method' => 'DELETE', 'route' => ['service.destroy', $row->id] ]) !!}
                       <a href="{{ URL::to('service/'.$row->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">@lang("Edit")</a>
                       <a href="{{ route('service.show', $row->id ) }}" class="btn btn-warning pull-left" style="margin-right: 3px;">@lang("Show")</a>

                    {!! Form::submit(__('Delete'), ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('service/create') }}" class="btn btn-success">@lang("Add Service")</a>

</div>

@endsection
