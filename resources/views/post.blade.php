@extends('main.layout.navbar')

@section('header')

@endsection
@section('content')

    <section class="features-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 ">
                    <h2>{{ $selectedCrud->title }}</h2>
        <img style="width: 100%!important; padding: 10px!important;" src="{{ URL::to('/') }}/images/{{ $selectedCrud->image }}" />


            <hr>


    </div>
                <p>{{ $selectedCrud->description }}</p>
    </div>
    </div>
    </section>

    <hr>



    <section class="miscellaneous-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="row align-items-end justify-content-center">
                @if($cruds->count()>0)

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="news--area mb-100 wow fadeInUp" data-wow-delay="500ms">
                            <!-- Section Heading -->
                            <div class="section-heading mb-50">
                                <div class="line"></div>
                                <h2>@lang("The news")</h2>
                            </div>
                            '@foreach($cruds as $crud)
                                <div class="single-news-area d-flex align-items-center">

                                    <!-- Single News Area -->
                                    <div class="news-thumbnail">
                                        <img src="/images/{{$crud->image}}" alt="">
                                    </div>
                                    <div class="news-content" style="padding-right: 10px!important;">
                                        <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $crud->created_at)->format('Y-m-d') }}</span>
                                        <a href= "{{ URL::to('post/'.$crud->id.'') }}" >

                                            {!! Str::limit($crud->description, $limit = 220  ) !!}
                                        </a>

                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>

            @endif


            <!-- Contact Area -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="contact--area mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <!-- Section Heading -->
                        <div class="section-heading mb-50">
                            <div class="line"></div>
                            <h2>@lang(("lines"))</h2>
                        </div>
                        <!-- Contact Content -->
                        <div class="contact-content">
                            <!-- Single Contact Content -->
                            @foreach($lineorta as $item)
                                <div class="single-contact-content d-flex align-items-center">
                                    <div class="icon">
                                        <img src="/main/img/core-img/location.png" alt="">
                                    </div>
                                    <a href= "{{ URL::to('lines/'.$item->id.'') }}" >
                                        <div class="text" style="padding-right: 10px!important;">
                                            <p>   {{$item->name}} <<   @lang("price") : {{$item->price}}  @lang("tl")   >><br>   {{$item->duration}}</p>
                                        </div>
                                    </a>
                                </div>
                        @endforeach
                        <!-- Single Contact Content -->

                        </div>
                    </div>
                </div>

                <!-- News Area -->

            </div>
        </div>
    </section>



@endsection
