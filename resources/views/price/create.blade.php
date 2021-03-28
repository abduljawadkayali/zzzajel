@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">

        <h1><i class="fas fa-lira-sign"></i>  @lang("Add Price")</h1>

     <div class="row">

        <div class='col-lg-6 col-lg-offset-6' >

			<hr>
			 {{ Form::open(array('url' => 'price', 'method' => 'POST', 'files' => true))}}


            <div class="form-group">
                @lang("Mazot")
                <br>
                {{ Form::number('mazot', null, ['class' => 'form-control','step' => '0.001']) }}

            </div>


            <div class="form-group">
                @lang("Barrel Mazot")
                <br>
                {{ Form::number('barrelMazot', null, ['class' => 'form-control','step' => '0.001']) }}


            </div>


            <div class="form-group">
                @lang("Benzin")
                <br>
                {{ Form::number('benzin', null, ['class' => 'form-control','step' => '0.001']) }}


            </div>

            <div class="form-group">
                @lang("Barrel Benzin")
                <br>
                {{ Form::number('barrelBenzin', null, ['class' => 'form-control','step' => '0.001']) }}

            </div>



            {{Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
         </div>
    </div>
     </div>
</div>


</br>

@endsection


