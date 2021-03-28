@extends('Editor.Dashbored.Admin')

@section('title', '| Posts')


@section('content')


<div class="col-lg-12 col-lg-offset-1">
    <h1><i class="fa fa-bus"></i>
    @lang("Student Balance")
</h1>
  <a href="{{ URL::to('StudentBalance/create') }}" class="btn btn-success">@lang("Add Student Balance")</a>
    <hr>
          @if(count($students) >0)
    <div class="table-responsive">
             <table class="table datatable table-bordered table-striped">


            <thead>
                <tr>
                    <th>@lang("monthNumber")</th>
                    <th>@lang("balance")</th>
                     <th>@lang("Operation")</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->monthNumber }}</td>
                    <td>{{ __($student->balance) }}</td>

<td>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['StudentBalance.destroy', $student->id] ]) !!}

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
