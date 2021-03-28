@extends('main.layout.navbar')

@section('header')

@endsection
@section('content')
    @include('sweetalert::alert')
<br>
<br>
<br>

<h1 style="text-align: center">@lang("work with us")</h1>
    <br>
    <br>
    <h2 style="text-align: center">@lang("We will announce job opertuonties as is avialble")</h2>
    <br><br>
    <br>
    <br><br>
    <br>
    <br>


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
                </div>

                <!-- News Area -->

            </div>
            </div>
        </section>






@endsection
<style>
    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .vdeo {
            width: 850px!important;
            height: 450px!important;
        }
    }
    @media only screen and (max-width: 767px) {
        .vdeo {
            width: 350px!important;
            height: 250px!important;
        }
    }
</style>
