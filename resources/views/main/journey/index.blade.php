@extends('layouts.Admin')

@section('title', '| Posts')

@section('content')

<div class="col-lg-12 col-lg-offset-1">
    <h1><i class="fa fa-newspaper"></i>
    @lang("Journey")
</h1>
    <hr>
    <div class="table-responsive">
             <table class="table datatable table-bordered table-striped">

            <thead>
                <tr>
                    <th>@lang("Name")</th>
                    <th>@lang("adres")</th>
                    <th>@lang("Operations")</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lines as $journey)
                <tr>
                    <td>{{ $journey->name }}</td>
                    <td>{{ $journey->adres }}</td>

<td>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['journey.destroy', $journey->id] ]) !!}
                       <a href="{{ URL::to('journey/'.$journey->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">@lang("Edit")</a>

                    {!! Form::submit(__('Delete'), ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('journey/create') }}" class="btn btn-success">@lang("Add journey")</a>

</div>
<script>
    $(document).ready( function () {
        $('.datatable').DataTable();
        $('div.dataTables_filter label input').addClass('form-control');
    } );
    </script>

@endsection
