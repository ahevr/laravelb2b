<!--header-->
<header class="hdr-wrap">
    <div class="hdr-content hdr-content-sticky">
        <div class="container">
            <div class="row">
                <div class="col-auto show-mobile">
                    <!-- Menu Toggle -->
                    <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
                    <!-- /Menu Toggle -->
                </div>
                <div class="col-auto hdr-logo">
                    <a href="{{route("site.index")}}" class="logo"><img srcset="{{asset("app/site")}}/images/logo.png 1x,{{asset("app/site")}}/images/logo.png 2x" alt="Logo"></a>
                </div>
                <!--navigation-->
                <div class="hdr-nav hide-mobile nav-holder-s"></div>
                <!--//navigation-->
                <div class="hdr-links-wrap col-auto ml-auto">
                    <div class="hdr-inline-link">
                        <!-- Header Search -->
                        <div class="search_container_desktop">
                            <div class="dropdn dropdn_search dropdn_fullwidth">
                                <a href="#" class="dropdn-link  js-dropdn-link only-icon">
                                    <i class="icon-search"></i>
                                    <span class="dropdn-link-txt">Ara!</span>
                                </a>
                                <div class="dropdn-content">
                                    <div class="container">
                                        <form method="get" action="{{route("site.search")}}" class="search search-off-popular">
                                            <input name="q" type="text" class="search-input input-empty" placeholder="Bir Ürün Ara?">
                                            <button type="submit" class="search-button"><i class="icon-search"></i></button>
                                            <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Header Search -->
                        <!-- Header Wishlist -->
                        <!-- /Header Wishlist -->
                        <!-- Header Account -->

                        <div class="dropdn dropdn_account dropdn_fullheight">
                            <a href="#"
                               class="dropdn-link js-dropdn-link js-dropdn-link only-icon"
                               data-panel="#dropdnAccount"><i class="icon-user"></i>
                                <span class="dropdn-link-txt">{{ substr(Auth::guard("bayi")->user()->bayi_adi,0,30) }}</span>


                            </a>
                        </div>
                        <!-- /Header Account -->
                        <div class="dropdn dropdn_fullheight minicart">
                            <a href="{{route("site.card.index")}}" class="dropdn-link js-dropdn-link minicart-link only-icon" data-panel="#dropdnMinicart">
                                <i class="icon-basket"></i>
                                <span class="minicart-qty">{{Cart::instance('shopping')->count()}} </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hdr">
        <div class="hdr-topline hdr-topline--dark js-hdr-top">
            <div class="container">
                <div class="row flex-nowrap">
                    <div class="col hdr-topline-left hide-mobile">
                        <!-- Header Social -->
                        <div class="hdr-line-separate">
                            <ul class="social-list list-unstyled">
                                <li>
                                    <a href="#"><i class="icon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /Header Social -->
                    </div>
                    <div class="col hdr-topline-center">
                        <div class="custom-text js-custom-text-carousel" data-slick='{"speed": 1000, "autoplaySpeed": 3000}'>
                            @foreach($slick as $rowSlick)
                                <div class="custom-text-item"><i class="icon-stopwatch"></i>
                                    {{$rowSlick->title}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col hdr-topline-right hide-mobile">
                        <div class="hdr-inline-link">
                            <div class="hdr_container_desktop">
                                <!-- Header Account -->
                                <div class="dropdn dropdn_account dropdn_fullheight">
                                    <a href="#" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">{{ substr(Auth::guard("bayi")->user()->bayi_adi,0,30) }}</span></a>
                                </div>
                                <!-- /Header Account -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hdr-content">
            <div class="container">
                <div class="row">
                    <div class="col-auto show-mobile">
                        <!-- Menu Toggle -->
                        <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
                        <!-- /Menu Toggle -->
                    </div>
                    <div class="col-auto hdr-logo">
                        <a href="{{route("site.index")}}" class="logo"><img width="150px" srcset="{{asset("app/site")}}/images/logo.png 1x,{{asset("app/site")}}/images/logo.png 2x" alt="Logo"></a>
                    </div>
                    <!--navigation-->
                    <div class="hdr-nav hide-mobile nav-holder justify-content-center px-4">
                        <!--mmenu-->
                        <ul class="mmenu mmenu-js">
                            <li><a href="{{route("site.index")}}">Ana Sayfa</a></li>
                            <li><a href="{{route("site.urunler.index")}}">Ürünler</a></li>
                            <li><a href="https://egesedefavize.com/kataloglar">Kataloglar</a></li>
                            <li><a href="https://tahsilat.egesedefavize.com/">Ödeme Yap</a></li>
                        </ul>
                        <!--/mmenu-->
                    </div>
                    <!--//navigation-->
                    <div class="hdr-links-wrap col-auto ml-auto">
                        <div class="hdr-inline-link">
                            <!-- Header Search -->
                            <div class="search_container_desktop">
                                <div class="dropdn dropdn_search dropdn_fullwidth">
                                    <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">Ara!</span></a>
                                    <div class="dropdn-content">
                                        <div class="container">
                                            <form method="get" action="{{route("site.search")}}" class="search search-off-popular">
                                                <input name="q" type="text" class="search-input input-empty" placeholder="Bir Ürün Ara?">
                                                <button type="submit" class="search-button"><i class="icon-search"></i></button>
                                                <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Header Search -->
                            <!-- Header Wishlist -->
                            <!-- /Header Wishlist -->
                            <div class="hdr_container_mobile show-mobile">
                                <!-- Header Account -->
                                <div class="dropdn dropdn_account dropdn_fullheight">
                                    <a href="#" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">{{ substr(Auth::guard("bayi")->user()->bayi_adi,0,30) }}</span></a>
                                </div>
                                <!-- /Header Account -->
                            </div>
                            <div class="dropdn dropdn_fullheight minicart">
                                <a href="{{route("site.card.index")}}" class="dropdn-link js-dropdn-link minicart-link" data-panel="#dropdnMinicart">
                                    <i class="icon-basket"></i>
                                    <span class="minicart-qty">{{Cart::instance('shopping')->count()}}</span>
                                    <span class="minicart-total hide-mobile">

                                       <?php
                                        $isk1 = Cart::totalFloat() * Auth::guard("bayi")->user()->bayi_isk1 / 100 ;
                                        $isk2 = Cart::totalFloat() - $isk1;
                                        $indirimHesapla2 = $isk2 * Auth::guard("bayi")->user()->bayi_isk2 / 100 ;
                                        $genelToplam2 = $isk2 - $indirimHesapla2;
                                        ?>
                                           {{ number_format($genelToplam2,2,',','.')}}

                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="header-side-panel">
    <!-- Mobile Menu -->
    <div class="mobilemenu js-push-mbmenu">
        <div class="mobilemenu-content">
            <div class="mobilemenu-close mobilemenu-toggle">Kapat</div>
            <div class="mobilemenu-scroll">
                <div class="mobilemenu-search"></div>
                <div class="nav-wrapper show-menu">
                    <div class="nav-toggle">
                        <span class="nav-back"><i class="icon-angle-left"></i></span>
                        <span class="nav-title"></span>
                        <a href="#" class="nav-viewall">view all</a>
                    </div>
                    <ul class="nav nav-level-1">
                        <li><a href="{{route("site.index")}}">Ana Sayfa</a></li>
                        <li><a href="{{route("site.urunler.index")}}">Ürünler</a></li>
                        <li><a href="https://egesedefavize.com/kataloglar">Kataloglar</a></li>
                        <li><a href="https://tahsilat.egesedefavize.com/">Ödeme Yap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="dropdn-content account-drop" id="dropdnAccount">
        <div class="dropdn-content-block">
            <div class="dropdn-close"><span class="js-dropdn-close">Kapat</span></div>
            <ul>
                <li>
                    <form action="{{route("site.logout")}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">
                            <span>Çıkış Yap</span>
                            <i class="icon-login"></i>
                        </button>
                    </form>
                </li>
                <a class="btn btn-outline-primary mt-1" href="{{route("site.hesabim.index",Auth::guard("bayi")->user()->id)}}" >Hesap Bilgilerim   <i class="icon-user2"></i></a>
                <a class="btn btn-outline-primary mt-1" href="{{route("site.order.siparislerim",Auth::guard("bayi")->user()->id)}}" >Siparişlerim   <i class="icon-card-payment"></i></a>
                <a class="btn btn-outline-primary mt-1" href="{{route("site.order.carim",Auth::guard("bayi")->user()->id)}}" >Cari Hesap   <i class="icon-card-payment"></i></a>
                <a class="btn btn-outline-danger mt-1" href="{{route("site.card.index")}}" >Sepetim<i class="icon-basket"></i></a>
            </ul>
        </div>
        <div class="drop-overlay js-dropdn-close"></div>
    </div>
    <div class="dropdn-content minicart-drop" id="dropdnMinicart">
        <div class="dropdn-content-block">
            <div class="dropdn-close"><span class="js-dropdn-close">Kapat</span></div>
            <div class="minicart-drop-content js-dropdn-content-scroll">

                @foreach(Cart::instance('shopping')->content() as $productCartItem)
                    <div class="minicart-prd row">
                        <div class="minicart-prd-image image-hover-scale-circle col">
                            <a href="{{route("site.urunler.detail",$productCartItem->options->product_url)}}">
                                <img class="lazyload fade-up"
                                     src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                     data-src="{{asset("app/admin/uploads/urunler")}}/{{$productCartItem->options->image}}"
                                     alt="{{$productCartItem->name}}">
                            </a>
                        </div>
                        <div class="minicart-prd-info col">
                            <h2 class="minicart-prd-name"><a href="{{route("site.urunler.detail",$productCartItem->options->product_url)}}">{{$productCartItem->name}}</a></h2>
                            <div class="minicart-prd-qty"><span class="minicart-prd-qty-label">Adet:</span><span class="minicart-prd-qty-value">{{$productCartItem->qty}}</span></div>
                            <div class="minicart-prd-price prd-price">
                                <div class="d"> <small>Liste Fiyatı :&nbsp; </small></div>
                                <div class="price-new">  {{number_format($productCartItem->subtotal,2,",",".")}} TL</div>
                                <br>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="minicart-drop-fixed js-hide-empty">
                <div class="loader-horizontal-sm js-loader-horizontal-sm" data-loader-horizontal=""><span></span></div>
                <div class="minicart-drop-actions">
                    <a href="{{route("site.card.index")}}" class="btn btn--md btn--grey"><i class="icon-basket"></i><span>Sepete Git</span></a>
                </div>
                <ul class="payment-link mb-2">
                    <li><i class="icon-amazon-logo"></i></li>
                    <li><i class="icon-visa-pay-logo"></i></li>
                    <li><i class="icon-skrill-logo"></i></li>
                    <li><i class="icon-klarna-logo"></i></li>
                    <li><i class="icon-paypal-logo"></i></li>
                    <li><i class="icon-apple-pay-logo"></i></li>
                </ul>
            </div>
        </div>
        <div class="drop-overlay js-dropdn-close"></div>
    </div>
    <!-- /Mobile Menu -->
</div>
<!-- //Mobile Menu -->

<!--//header-->
