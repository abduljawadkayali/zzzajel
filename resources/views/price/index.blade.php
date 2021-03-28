@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1><i class="fas fa-lira-sign"></i>  @lang("Price")</h1>
<hr>

<br>

<table class="table table-bordered table-striped">
	<tr>
	<th>@lang("Mazot")</th>
	<th>@lang("Barrel Mazot")</th>
	<th>@lang("Benzin")</th>
	<th>@lang("Barrel Benzin")</th>
		<th>@lang("Operations")</th>
	</tr>


	@foreach($data as $row)

		<tr>
  <td>{{$row->mazot}}</td>
			<td>{{ $row->barrelMazot }}</td>
			<td>{{  $row->benzin }}</td>
			<td>{{  $row->barrelBenzin }}</td>

			<td>

				<form action="{{ route('price.destroy', $row->id) }}" method="post">

					<a href="{{ route('price.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">@lang("Delete")</button>
				</form>
			</td>
		</tr>




	@endforeach

</table>

<a href="{{ URL::to('/price/create') }}" class="btn btn-success">@lang("Add Price")</a>
<br>
	<br>
@endsection
