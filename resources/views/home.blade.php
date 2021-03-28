@extends('main.layout.navbar')

@section('header')

@endsection
@section('content')


    <div class="hero-area">
        <div class="hero-slideshow owl-carousel">

            <!-- Single Slide -->
            @foreach($backgrounds as $background)
            <div class="single-slide bg-img">
                <!-- Background Image-->
                <div class="slide-bg-img bg-img bg-overlay" style="background-image: url(/images/{{$background->image}});"></div>
                <!-- Welcome Text -->
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div class="welcome-text text-center">
                                <h2 data-animation="fadeInUp" data-delay="300ms">{{$background->title ?? ''}}</h2>
                                <p data-animation="fadeInUp" data-delay="500ms">{{$background->body ?? ''}}</p>
                                @if($background->link)
                                <a href="{{$background->link}}" class="btn credit-btn mt-50" data-animation="fadeInUp" data-delay="700ms">{{$background->link_title ?? ''}}</a>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide Duration Indicator -->
                <div class="slide-du-indicator"></div>
            </div>




                <!-- ##### Features Area Start ###### -->

@endforeach


        </div>
    </div>

    @if($video )
    <section class="features-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Section Heading -->
                        <div class="section-heading">
                            <div class="line"></div>

                            <h2>{{$video->title ?? ''}}</h2>
                        </div>
                        <h6>{{$video->body ?? ''}}</h6>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <?php
                    $url = $video->link;

                    if($url != null)
                    {
                        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                        $id = $matches[1] ?? '';

                    }
                    $width  = '800px';
                    $height = '450px';

                    ?>
                    <iframe class="vdeo" id="ytplayer" type="text/html" width="<?php echo $width ?? '' ?>" height="<?php echo $height ?>"
                            src="https://www.youtube.com/embed/<?php echo $id ?? '' ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                            frameborder="0" allowfullscreen></iframe>
                </div>
                </div>
            </div>
    </section>

    @endif


    <!-- ##### Call To Action Start ###### -->
     <hr>

    <!-- ##### Services Area Start ###### -->
    <section class="services-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <div class="line"></div>
                        <p>@lang("look at our services")</p>
                        <h2>@lang("Our services")</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="200ms">
                        <div class="icon">
                            <i class="fas fa-route"></i>
                        </div>
                        <div class="text">
                            <h5>@lang("lines for every place")</h5>
                            <p>@lang("we have lines to every where in the south")</p>
                        </div>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <div class="icon">
                            <i class="far fa-clock"></i>
                        </div>
                        <div class="text">
                            <h5>@lang("we are good in timing")</h5>
                            <p>@lang("Our lines goes in spesific hours with out any timeout")</p>
                        </div>
                    </div>
                </div>
                </div>
            <div class="row">
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="200ms">
                        <div class="icon">
                            <i class="fas fa-road"></i>
                        </div>
                        <div class="text">
                            <h5>@lang("custumors important")</h5>
                            <p>@lang("the most important thing for us is our customrs")</p>
                        </div>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <div class="icon">
                            <i class="icon-coin"></i>
                        </div>
                        <div class="text">
                            <h5>@lang("save your money")</h5>
                            <p>@lang("save your money  with us we ake a litle money take our card and enjoy")</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <!-- ##### Miscellaneous Area Start ###### -->



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
                    @foreach($cruds as $crud)
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






    <style>
        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .vdeo {
                width: 850px!important;
                height: 450px!important;
            }
        }
        @media only screen and (max-width: 767px) {

            .vdeo {
                width: 250px!important;
                height: 250px!important;
            }
        }
    </style>



@endsection
