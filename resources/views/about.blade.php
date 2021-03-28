@extends('main.layout.navbar')

@section('header')

@endsection
@section('content')
    @include('sweetalert::alert')
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

<br>
    <hr>
    @if($part1->first())
        <!-- ======= Work Process Section ======= -->

                <?php
                $i =0;
                ?>
                @foreach($part1 as $row)
                    @if($i % 2 == 0)
                        <section class="cta-area d-flex flex-wrap">
                            <!-- Cta Content -->
                            <div class="cta-content">
                                <!-- Section Heading -->
                                <div class="section-heading white">
                                    <div class="line"></div>
                                    <p> </p>
                                    <h2>{{$row->title}}</h2>
                                </div>
                                <h6 class="mb-0"> {{$row->description}}</h6>

                            </div>
                            <!-- Cta Thumbnail -->
                            <div class="cta-thumbnail bg-img jarallax" style="background-image:  url(/images/{{$row->image}});"></div>
                        </section>

                    @endif

                    @if($i % 2 == 1)

                        <section class="about-area section-padding-100-0">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6">
                                        <div class="about-content mb-100">
                                            <!-- Section Heading -->
                                            <div class="section-heading">
                                                <div class="line"></div>
                                                <p> </p>
                                                <h2>{{$row->title}}</h2>
                                            </div>
                                            <h6 class="mb-4">{{$row->description}}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="about-thumbnail mb-100">
                                            <img src="/images/{{$row->image}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    @endif
                    <?php
                    $i++;
                    ?>
                @endforeach

            </div>
        </section>
        <!-- End Work Process Section -->

    @endif


    @if($crudsPart2->count()>0)
        <section class="about-area section-padding-100-0">
            <div class="container">
                @foreach($crudsPart2 as $item)
                    <hr>
                    <div class="row align-items-center">
                        <div class="col-12 col-md-8">
                            <div class="about-content mb-100">
                                <!-- Section Heading -->
                                <div class="section-heading">
                                    <div class="line"></div>
                                    <p></p>
                                    <h2>{{$item->title}}</h2>
                                </div>
                                <h6 class="mb-4"></h6>
                                <p class="mb-0">{{$item->description}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="about-thumbnail mb-100">
                                <img src="/images/{{$item->image}}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


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

    @endif




                    <div class="map-area">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
                        <!-- Contact Area -->
                        <div class="contact---area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <!-- Contact Area -->
                                        <div class="contact-form-area contact-page">
                                            <h4 class="mb-50">@lang("Send a message")</h4>
                                            {{ Form::open(array('route' => 'contact.store')) }}

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>@lang("your Name")</label>
                                                            <input type="text" class="form-control" name="name"  >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>@lang("Your Phone")</label>
                                                            <input type="number" class="form-control" name="phone" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>@lang("Your Subject")</label>
                                                            <input type="text" class="form-control" name="subject">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>@lang("Your Message")</label>
                                                            <textarea name="message" class="form-control" name="message" cols="30" rows="10" ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn credit-btn mt-30" type="submit">@lang("Send")</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
