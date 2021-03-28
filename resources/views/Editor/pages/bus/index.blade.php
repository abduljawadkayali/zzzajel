@extends('Editor.Dashbored.Admin')

@section('title', '| Posts')


@section('content')


<div class="col-lg-12 col-lg-offset-1">
    <h1><i class="fa fa-bus"></i>
    @lang("Buses")
</h1>
    <hr>
    <a href="{{ URL::to('bus/create') }}" class="btn btn-success">@lang("Add Bus")</a>
  <hr>
          @if(count($buses) >0)
    <div class="table-responsive">
             <table class="table datatable table-bordered table-striped">


            <thead>
                <tr>
                    <th>@lang("busDriver")</th>
                    <th>@lang("busNumber")</th>
                    <th>@lang("DeviceNumber")</th>
                    <th>@lang("DriverPhone")</th>
                    <th>@lang("status")</th>
                    <th>@lang("DriverId")</th>
                    <th>@lang("MemoryAdres")</th>
                     <th>@lang("Operation")</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buses as $bus)
                <tr>
                    <td>{{ $bus->busDriver }}</td>
                    <td>{{ __($bus->busNumber) }}</td>
                    <td>{{ $bus->DeviceNumber }}</td>
                    <td>{{ $bus->DriverPhone }}</td>
                    <td>{{  __($bus->status)}}</td>
                    <td>{{ $bus->DriverId }}</td>
                    <td>{{ $bus->MemoryAdres }}</td>

<td>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['bus.destroy', $bus->id] ]) !!}
                       <a href="{{ URL::to('bus/'.$bus->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">@lang("Edit")</a>

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
    $(document).ready( function () {
        $('.datatable').DataTable();
        $('div.dataTables_filter label input').addClass('form-control');
    } );
    </script>
@endsection
