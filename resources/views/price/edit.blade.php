@extends('layouts.Admin')

@section('header')
@endsection
@section('content')

<h1><i class="fa fa-edit"> </i>  @lang("Edit")</h1>
<hr>

<form method="post" action="{{ route('price.update', $data->id) }}" enctype="multipart/form-data">

	@csrf
	@method('PATCH')

    <div class="form-group">
        <label class="col-md-4">@lang("Mazot")</label>
        <div class="col-md-8">
            <input type="number" step="0.001" name="mazot" value="{{ $data->mazot }}" class="form-control input-lg"  />
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4">@lang("Barrel Mazot")</label>
        <div class="col-md-8">
            <input type="number" step="0.001" name="barrelMazot" value="{{ $data->barrelMazot }}" class="form-control input-lg"  />
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4">@lang("Benzin")</label>
        <div class="col-md-8">
            <input type="number" step="0.001" name="benzin" value="{{ $data->benzin }}" class="form-control input-lg"  />
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4">@lang("Barrel Benzin")</label>
        <div class="col-md-8">
            <input type="number" step="0.001" name="barrelBenzin" value="{{ $data->barrelBenzin }}" class="form-control input-lg"  />
        </div>
    </div>




	<br />
	<div class="form-group">
		<input type="submit" name="edit" class="btn btn-primary input-lg"/>
	</div>
</form>




@endsection




