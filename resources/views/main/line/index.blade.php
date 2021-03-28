@extends('layouts.Admin')

@section('title', '| Posts')


@section('content')


    <div class="col-lg-12 col-lg-offset-1">
        <h1><i class="fas fa-tablet-alt"></i>
            @lang("Lines")
        </h1>
        <hr>
        <a href="{{ URL::to('line/create') }}" class="btn btn-success">@lang("Add Line")</a>
        <hr>
        @if (count($lines) > 0)
            <div class="table-responsive">
                <table class="table datatable table-bordered table-striped">


                    <thead>
                        <tr>
                            <th>@lang("name")</th>
                            <th>@lang("Joruney")</th>
                            <th>@lang("price")</th>
                            <th>@lang("duration")</th>
                            <th>@lang("startingTime")</th>
                            <th>@lang("status")</th>
                            <th>@lang("Operation")</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lines as $line)
                            <tr>
                                <td>{{ $line->name }}</td>
                                <td>{{ $line->jorney->name }}</td>
                                <td>{{ __($line->price) }}</td>
                                <td>{{ $line->duration }}</td>
                                <td>{{ $line->startingTime }}</td>
                                <td>{{ $line->status }}</td>

                                <td>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['line.destroy', $line->id]]) !!}
                                    <a href="{{ URL::to('line/' . $line->id . '/edit') }}" class="btn btn-info pull-left"
                                        style="margin-right: 3px;">@lang("Edit")</a>

                                    {!! Form::submit(__('Delete'), ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif


    </div>
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();
            $('div.dataTables_filter label input').addClass('form-control');
        });

    </script>
@endsection
