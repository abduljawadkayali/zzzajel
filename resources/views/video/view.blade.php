@extends('layouts.Admin')

@section('header')
    <div >
        <a href="{{ URL::previous() }}" class="btn btn-default">@lang("Back")</a>
    </div>
@endsection
@section('content')
    <h3>@lang('Title')- {{ $data->title}}</h3>
    <h3>@lang('Text')- {{ $data->body}}</h3>

<div class="jumbotron text-center">

    <?php
    $url = $data->link;

    if($url != null)
    {
        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
        $id = $matches[1] ?? '';

    }
    $width  = '800px';
    $height = '450px';

    ?>
    <iframe id="ytplayer" type="text/html" width="<?php echo $width ?? '' ?>" height="<?php echo $height ?>"
            src="https://www.youtube.com/embed/<?php echo $id ?? '' ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
            frameborder="0" allowfullscreen></iframe>
</div>
@endsection
