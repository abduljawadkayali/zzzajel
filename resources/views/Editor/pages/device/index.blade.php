@extends('Editor.Dashbored.Admin')

@section('title', '| Posts')


@section('content')


<div class="col-lg-12 col-lg-offset-1">
    <h1><i class="fas fa-tablet-alt"></i>
    @lang("Devices")
</h1>
    <hr>
        <a href="{{ URL::to('device/create') }}" class="btn btn-success">@lang("Add Device")</a>
           <hr>
        @if(count($devices) >0)
    <div class="table-responsive">
             <table class="table datatable table-bordered table-striped">


            <thead>
                <tr>
                    <th>@lang("Saler Name")</th>
                    <th>@lang("Device Number")</th>
                    <th>@lang("Adres")</th>
                    <th>@lang("SalerPhone")</th>
                    <th>@lang("status")</th>
                    <th>@lang("MemoryAdres")</th>
                     <th>@lang("Operation")</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devices as $device)
                <tr>
                    <td>{{ $device->SalerName }}</td>
                    <td>{{ __($device->DeviceNumber) }}</td>
                    <td>{{ $device->Adres }}</td>
                    <td>{{ $device->SalerPhone }}</td>
                    <td>{{ $device->status }}</td>
                    <td>{{ $device->MemoryAdres }}</td>

<td>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['device.destroy', $device->id] ]) !!}
                       <a href="{{ URL::to('device/'.$device->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">@lang("Edit")</a>

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
