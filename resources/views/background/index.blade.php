@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1><i class="fas fa-images"></i>@lang("Background")</h1>
<hr>

<br>

<table class="table table-bordered table-striped">
	<tr>
	<th>@lang("Title")</th>
	<th>@lang("Body")</th>
	<th>@lang("Link Title")</th>
	<th>@lang("Link")</th>
		<th>@lang("Photo")</th>
		<th>@lang("Operations")</th>
	</tr>


	@foreach($data as $row)

		<tr>
			<td>{{ $row->title }}</td>
			<td>{{ $row->body }}</td>
			<td>{{ $row->link_title }}</td>
			<td>{{ $row->link }}</td>
			<td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="150" /></td>

			<td>

				<form action="{{ route('background.destroy', $row->id) }}" method="post">
					<a href="{{ route('background.show', $row->id) }}" class="btn btn-primary">@lang("Show")</a>
					<a href="{{ route('background.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">@lang("Delete")</button>
				</form>
			</td>
		</tr>




	@endforeach

</table>

<a href="{{ URL::to('/background/create') }}" class="btn btn-success">@lang("Add Photo")</a>
<br>
	<br>
@endsection
