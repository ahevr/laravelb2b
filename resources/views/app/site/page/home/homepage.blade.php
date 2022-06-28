@extends("app.site.sitemasterpage")
@section("title","Ege Sedef Aydınlatma B2b Sistemi")
@section("description", "EGE SEDEF AVİZE olarak, 22 yıldır ülkemize hizmet etmenin sevincini yaşamaktayız. Tüm Türkiye'ye ürün gönderen firmamız ülkemizin gururu olmuştur.")
@section("keywords", "avize,sedefavize,aydınlatma,aplik,lambader,salonavizesi")
@section("content")
    <!-- Main Slider 1 -->
    <div class="holder fullwidth full-nopad mt-0">
        <div class="container">
            <div class="bnslider-wrapper">
                <div class="bnslider bnslider--lg keep-scale" id="bnslider-001" data-slick='{"arrows": true, "dots": true}' data-autoplay="false" data-speed="12000" data-start-width="1917" data-start-height="764" data-start-mwidth="1550" data-start-mheight="1000">
                    <!-- Slide -->
                    @foreach($slider as $row)
                        <div class="bnslider-slide">
                            <div class="bnslider-image-mobile lazyload" data-bgset="{{asset("app/admin/uploads/slider/".$row->image)}}"></div>
                            <div class="bnslider-image lazyload" data-bgset="{{asset("app/admin/uploads/slider/".$row->image)}}"></div>
                            <div class="bnslider-text-wrap bnslider-overlay ">
                                <div class="bnslider-text-content txt-middle txt-right txt-middle-m txt-center-m">
                                    <div class="bnslider-text-content-flex ">
                                        <div class="bnslider-vert w-s-60 w-ms-100" style="padding: 0px">
                                            <div class="bnslider-text order-1 mt-sm bnslider-text--md text-center data-ini" data-animation="fadeInUp" data-animation-delay="800" data-fontcolor="#282828" data-fontweight="700" data-fontline="1.5"> {{$row->title}}</div>
                                            <div class="bnslider-text order-2 mt-sm bnslider-text--xs text-center data-ini" data-animation="fadeInUp" data-animation-delay="1000" data-fontcolor="#7c7c7c" data-fontweight="400" data-fontline="1.5">{{$row->desc}}</div>
                                            <div class="btn-wrap text-center  order-4 mt-md" data-animation="fadeIn" data-animation-delay="2000" style="opacity: 1;">
                                                <a href="{{$row->buton_url}}" target="_blank" class="btn">
                                                    {{$row->buton_name}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- EndSlide  -->

                </div>
                <div class="bnslider-arrows container-fluid">
                    <div></div>
                </div>
                <div class="bnslider-dots container-fluid"></div>
            </div>
        </div>
    </div>
    <!-- //Main Slider -->
@endsection

