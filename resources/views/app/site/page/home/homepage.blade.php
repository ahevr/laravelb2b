@extends("app.site.sitemasterpage")
@section("title","Ege Sedef Aydınlatma B2b Sistemi")
@section("description", "EGE SEDEF AVİZE olarak, 22 yıldır ülkemize hizmet etmenin sevincini yaşamaktayız. Tüm Türkiye'ye ürün gönderen firmamız ülkemizin gururu olmuştur.")
@section("keywords", "avize,sedefavize,aydınlatma,aplik,lambader,salonavizesi")
@section("content")

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ol>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif
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
    <div class="holder">
        <div class="container">
            <div class="form-card-bg">
                <h2 class="text-center">İletişim</h2>
                <div class="form-wrapper">
                    <form class="contact-form" enctype="multipart/form-data" action="{{route("site.ContactUsForm")}}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <div class="row vert-margin-middle">
                                <div class="col-lg">
                                    <input type="text" name="name" class="form-control" placeholder="Ad Soyad" required="">
                                </div>
                                <div class="col-lg">
                                    <input type="text" name="email" class="form-control" placeholder="Email" required="">
                                </div>
                                <div class="col-lg">
                                    <input type="text" name="phone" class="form-control" placeholder="Telefon" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control textarea--height-170" name="message" placeholder="Mesajınız" required=""></textarea>
                        </div>
                        <div class="text-center mt-0">
                            <button class="btn btn-submit" type="submit">Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="contact-map-under-form">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12521.872861804204!2d27.146111!3d38.314987!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2bc1578c688da4d9!2sEge%20Sedef%20Ayd%C4%B1nlatma!5e0!3m2!1str!2str!4v1655104784232!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection

