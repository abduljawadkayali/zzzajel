@extends('main.layout.navbar')

@section('header')
@endsection
@section('content')
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-repeat:no-repeat!important;;
        background-size:contain!important;
        background-position:center!important;;
        background-image: url(/images/{{$selectedLine->image}});">
        <div class="container h-100">
            <div class="row h-200 align-items-center">
                <div class="col-12">

                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-6 ">
                <h2 style="padding: 25px!important; text-align: left!important;">{{ $selectedLine->name }}</h2>

            </div>
                <div class="col-6 ">

                    <h2 style="padding: 25px!important;"> @lang("price") :  {{ $selectedLine->price }} @lang("tl")</h2>

            </div>
            </div>
            </div>
    <section class="features-area section-padding-0-0">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 ">
                    <section class="time-line-box">
                        <h2>@lang("Starting Time")</h2>
                        <br>
                        <div class="swiper-container text-center">
                            <div class="swiper-wrapper">

                                @foreach($timearray as $item)



                                    <div class="swiper-slide">
                                        <div  class="timestamp"><span class="date">  {{$item}}</span></div>
                                        <div class="status"><span></span></div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </section>
                    <br>  <br>
                    <br>
                    <section class="time-line-box">
                    <h2>@lang("durations")</h2>

                        <div class="swiper-container text-center">
                            <div class="swiper-wrapper">

@foreach($linearray as $item)



                                <div class="swiper-slide">
                                    <div class="timestamp"><span class="date"> </span></div>
                                    <div class="status"><span> {{$item}}</span></div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </section>





                </div>
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
<script>
    $(function(){
        var inputs = $('.input');
        var paras = $('.description-flex-container').find('p');
        inputs.click(function(){
            var t = $(this),
                ind = t.index(),
                matchedPara = paras.eq(ind);

            t.add(matchedPara).addClass('active');
            inputs.not(t).add(paras.not(matchedPara)).removeClass('active');
        });
    });
</script>
<style>

    .time-line-box {
        height: 100px;
        width: 100%;
    }

    .time-line-box .timeline {
        list-style-type: none;
        display: flex;
        padding: 0;
        text-align: center;
    }

    .time-line-box .timestamp {
        margin: auto;
        margin-bottom: 5px;
        padding: 0px 4px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .time-line-box .status {
        padding: 0px 10px;
        display: flex;
        justify-content: center;
        border-top: 3px solid #455EFC;
        position: relative;
        transition: all 200ms ease-in;
    }
    .time-line-box .status span {
        padding-top: 8px;
    }
    .time-line-box .status span:before {
        content: '';
        width: 12px;
        height: 12px;
        background-color: #455EFC;
        border-radius: 12px;
        border: 2px solid #455EFC;
        position: absolute;
        left: 50%;
        top: 0%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        transition: all 200ms ease-in;
    }

    .swiper-container {
        width: 95%;
        margin: auto;
        overflow-y: auto;
    }
    .swiper-wrapper{
        display: inline-flex;
        min-width: 100%!important;
        flex-direction: row;
        overflow-y:auto;
        justify-content: center;
    }
    .swiper-container::-webkit-scrollbar-track{
        background:#a8a8a8b6;
    }
    .swiper-container::-webkit-scrollbar{
        height: 2px;
    }
    .swiper-container::-webkit-scrollbar-thumb{
        background: #4F4F4F !important;
    }
    @media screen and (max-width: 768px) {
        .time-line-box .status span {
            padding-left: 15px;
        }
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        width: 15%;
        height: 100%;
        position: relative;
    }

</style>
@endsection
