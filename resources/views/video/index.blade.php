@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1><i class="fas fa-video"></i>@lang("Video")</h1>
<hr>

<br>

<table class="table table-bordered table-striped">
	<tr>
	<th>@lang("Title")</th>
	<th>@lang("Body")</th>
	<th>@lang("Link")</th>
		<th>@lang("Operations")</th>
	</tr>


	@foreach($data as $row)

		<tr>
			<td>{{ $row->title }}</td>
			<td>{{ $row->body }}</td>
			<td>{{ $row->link }}</td>

			<td>

				<form action="{{ route('video.destroy', $row->id) }}" method="post">
					<a href="{{ route('video.show', $row->id) }}" class="btn btn-primary">@lang("Show")</a>
					<a href="{{ route('video.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">@lang("Delete")</button>
				</form>
			</td>
		</tr>




	@endforeach

</table>

<a href="{{ URL::to('/video/create') }}" class="btn btn-success">@lang("Add Video")</a>
<br>
	<br>
@endsection
