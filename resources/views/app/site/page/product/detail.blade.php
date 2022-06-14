@extends("app.site.sitemasterpage")
@section('title',  e(strip_tags(trim($productDetailGet->product_name))) )
@section("description", "Ege Sedef Avize"." ".e(strip_tags(trim($productDetailGet->product_name))))
@section("keywords", "avize,sedefavize,aydınlatma,aplik,lambader,salonavizesi,masalambası,ithalürünler")
@section("content")
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{route("site.index")}}">Ana Sayfa</a></li>
                <li><a href="{{route("site.urunler.index")}}">Ürünler</a></li>
                <li>
                    <span>{{$productDetailGet->category->name}}</span>
                </li>
                <li>
                    <span>{{$productDetailGet->product_name}}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="holder">
        <div class="container js-prd-gallery" id="prdGallery">
            <div class="row prd-block prd-block--prv-bottom prd-block--prv-double">
                <div class="col-md-8 col-lg-8 aside--sticky js-sticky-collision">
                    <div class="aside-content">
                        <!-- Product Gallery -->
                        <div class="mb-2 js-prd-m-holder"></div>
                        <div class="prd-block_main-image">
                            <div class="prd-block_main-image-holder" id="prdMainImage">
                                <div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">
                                    <div data-value="Beige">
                                        <span class="prd-img">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{asset("app/admin/uploads/urunler/".$productDetailGet->image)}}"
                                                 class="lazyload fade-up elzoom"
                                                 alt="{{$productDetailGet->product_name}}"
                                                 data-zoom-image="{{asset("app/admin/uploads/urunler/".$productDetailGet->image)}}"/>
                                        </span>
                                    </div>
                                </div>
                                <div class="prd-block_label-sale-squared justify-content-center align-items-center">
                                    <span>
                                        @if($productDetailGet->isNew > 0)
                                            <div class="label-new">
                                                <span>Yeni Ürün</span>
                                            </div>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="prd-block_main-image-links">
                                <a href="{{asset("app/admin/uploads/urunler/".$productDetailGet->image)}}" class="prd-block_zoom-link"><i class="icon-zoom-in"></i></a>
                            </div>
                        </div>
                        <div class="product-previews-wrapper">
                            <div class="product-previews-carousel js-product-previews-carousel" data-desktop="5" data-tablet="3">
                                <a href="#" data-value="Beige">
                                    <span class="prd-img">
                                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{asset("app/admin/uploads/urunler/".$productDetailGet->image)}}"
                                             class="lazyload fade-up"
                                             alt="{{$productDetailGet->product_name}}"/>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- /Product Gallery -->
                    </div>
                </div>
                <div class="col-md-10 col-lg-10 mt-1 mt-md-0">
                    <div class="prd-block_info prd-block_info--style1" data-prd-handle="/products/copy-of-suede-leather-mini-skirt">
                        <div class="prd-block_info-top prd-block_info_item order-0 order-md-2">
                            <div class="prd-block_price prd-block_price--style2">
                                <div class="prd-block_price--actual">
                                    <?php
                                    $isk1 = $productDetailGet->total_price * Auth::guard("bayi")->user()->bayi_isk1 / 100 ;
                                    $isk2 = $productDetailGet->total_price - $isk1;
                                    $indirimHesapla2 = $isk2 * Auth::guard("bayi")->user()->bayi_isk2 / 100 ;
                                    $genelToplam2 = $isk2 - $indirimHesapla2;
                                    $kdv = $genelToplam2 * Auth::guard("bayi")->user()->bayi_kdv ;
                                    ?>
                                    {{ number_format($kdv,2,',','.')}}TL
                                </div>
                                <div class="prd-block_price-old-wrap">
                                    <span class="prd-block_price--old">{{number_format($productDetailGet->total_price,2,',','.') }} TL</span>
                                    <span class="prd-block_price--text">İSK: {{Auth::guard("bayi")->user()->bayi_isk1 ." + ".Auth::guard("bayi")->user()->bayi_isk2}}<small> + <b>KDV</b></small></span>
                                </div>
                            </div>

                        </div>
                        <div class="prd-holder prd-block_info_item order-0 mt-15 mt-md-0">
                            <div class="prd-block_title-wrap">
                                <h1 class="prd-block_title">{{$productDetailGet->product_name}}</h1>
                            </div>
                        </div>
                        <div class="prd-block_description prd-block_info_item ">
                            <h3>Ürün Bilgisi</h3>
                            <p>{{$productDetailGet->product_desc}}</p>
                            <div class="mt-1"></div>
                            <div class="row vert-margin-less">
                                <div class="col-sm">
                                    <ul class="list-marker">
                                        <li>100% Yerli Üretim</li>
                                        <li>24 Ay Garanti</li>
                                    </ul>
                                </div>
                                <div class="col-sm">
                                    <ul class="list-marker">
                                        <li>Yanmaz Bakalit Duy</li>
                                        <li>ISO 9001</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="prd-progress prd-block_info_item" data-left-in-stock="">
                            <div class="prd-progress-text">
                                Stok Durumu :<span class="prd-progress-text-left js-stock-left">
                                    @if($productDetailGet->stock_quantity > 0 )
                                        {{$productDetailGet->stock_quantity}} Adet
                                    @else
                                        <span style="color: red">Stokta Yok !</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="prd-block_info-box prd-block_info_item">
                            <div class="two-column"><p>Availability:
                                    <span class="prd-in-stock" data-stock-status="">
                                          @if($productDetailGet->stock_quantity > 0 )
                                            <span style="color: yellowgreen">Stokta Var !</span>
                                        @else
                                            <span style="color: red">Stokta Yok !</span>
                                        @endif
                                    </span></p>
                                <p class="prd-taxes">Marka:
                                    <span>{{$productDetailGet->brand}}</span>
                                </p>
                                <p>Kategori: <span> <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top">{{$productDetailGet->category->name}}</a></span></p>
                                <p>Sku: <span data-sku="">{{$productDetailGet->product_code}}</span></p>
                                <p>Renk: <span>{{$productDetailGet->color}}</span></p>
                                <p>Malzeme: <span>{{$productDetailGet->material}}</span></p></div>
                        </div>
                        <div class="order-0 order-md-100">
                            <form method="post" action="#">
                                <div class="prd-block_actions prd-block_actions--wishlist">
                                    <div class="prd-block_qty">
                                        <div class="qty qty-changer">
                                            <button class="decrease js-qty-button"></button>
                                            <input type="number" class="qty-input" name="quantity" value="1" data-min="1" data-max="1000">
                                            <button class="increase js-qty-button"></button>
                                        </div>
                                    </div>
                                    <div class="btn-wrap">
                                        <button class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart">SEPETE EKLE</button>
                                    </div>
                                    <div class="btn-wishlist-wrap">
                                        <a href="#" class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--add js-add-wishlist" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                        <a href="#" class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--off js-remove-wishlist" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="holder prd-block_links-wrap-bg d-none d-md-block">
        <div class="prd-block_links-wrap prd-block_info_item container mt-2 mt-md-5 py-1">
            <div class="prd-block_link"><span><i class="icon-call-center"></i>24/7 Hizmet</span></div>
            <div class="prd-block_link">
                <span>sedefavize@hotmail.com.tr</span></div>
            <div class="prd-block_link"><span><i class="icon-delivery-truck"></i> 0(232) 253 95 03</span></div>
        </div>
    </div>
    <div class="holder mt-2 mt-md-5">
        <div class="container">
            <div class="panel-group panel-group--style1 prd-block_accordion" id="productAccordion">
                <div class="panel">
                    <div class="panel-heading ">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse2">
                                Açıklama</a>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse show">
                        <div class="panel-body">
                            <h4>Ürün Açıklaması</h4>
                            <p>{{$productDetailGet->product_desc}}</p>
                            <div class="container">
                                <div class="row vert-margin">
                                    <div class="col">
                                        <div class="lookbook-bnr">

                                            <div class="lookbook-bnr-image image-container" style="padding-bottom: 100%;width: 100%;">
                                                <img class="fade-up w-100 lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{asset("app/admin/uploads/urunler/".$productDetailGet->image)}}" width="100%" alt="Product">
                                            </div>

                                            <div class="lookbook-bnr-point" style="left: 39%; top: 22%;">
                                                <span data-toggle="popover" class="lookbook-popup-btn-lg" data-original-title=""><i class="icon-close-bold"></i></span>
                                                <div class="lookbook-popup js-popover-content">
                                                    <div class="prd-lookbook d-flex flex-column">
                                                        <div class="prd-info">
                                                            <h2 class="prd-title"><a title="Light Weight Fishing Rod" href="product.html">{{date("Y")}} </a></h2>
                                                            <p>Kullanılan Malzeme:{{$productDetailGet->material}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="lookbook-bnr-point" style="left: 65%; top: 51%;">
                                                <span data-toggle="popover" class="lookbook-popup-btn-lg" data-original-title=""><i class="icon-close-bold"></i></span>
                                                <div class="lookbook-popup js-popover-content">
                                                    <div class="prd-lookbook d-flex flex-column">
                                                        <div class="prd-info">
                                                            <h2 class="prd-title"><a title="Light Weight Fishing Rod" href="product.html">{{date("Y")}} </a></h2>
                                                            <p>Kullanım Alanı:{{$productDetailGet->usage_area}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="lookbook-bnr-point" style="left: 79%; top: 22%;">
                                                <span data-toggle="popover" class="lookbook-popup-btn-lg" data-original-title=""><i class="icon-close-bold"></i></span>
                                                <div class="lookbook-popup js-popover-content">
                                                    <div class="prd-lookbook d-flex flex-column">
                                                        <div class="prd-info">
                                                            <h2 class="prd-title"><a title="Light Weight Fishing Rod" href="product.html">{{date("Y")}} </a></h2>
                                                            <p>Kol sayısı: {{$productDetailGet->kol_sayisi}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="lookbook-bnr-point" style="left: 22%; top: 52%;">
                                                <span data-toggle="popover" class="lookbook-popup-btn-lg" data-original-title=""><i class="icon-close-bold"></i></span>
                                                <div class="lookbook-popup js-popover-content">
                                                    <div class="prd-lookbook d-flex flex-column">
                                                        <div class="prd-info">
                                                            <h2 class="prd-title"><a title="Light Weight Fishing Rod" href="product.html">{{date("Y")}}   </a></h2>
                                                            <p> olarak, 22 yıldır ülkemize hizmet etmenin sevincini yaşamaktayız.
                                                                Tüm Türkiye'ye ürün gönderen firmamız ülkemizin gururu olmuştur.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="lookbook-bnr-point" style="left: 62%; top: 12%;">
                                                <span data-toggle="popover" class="lookbook-popup-btn-lg" data-original-title=""><i class="icon-close-bold"></i></span>
                                                <div class="lookbook-popup js-popover-content">
                                                    <div class="prd-lookbook d-flex flex-column">
                                                        <div class="prd-info">
                                                            <h2 class="prd-title"><a title="Light Weight Fishing Rod" href="product.html">{{date("Y")}}   </a></h2>
                                                            <p>24 Ay Garanti.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading active">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse1">
                                Ürün Özellikleri</a>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table table-striped">

                                <tr>
                                    <th scope="row">Kullanım Alanı</th>
                                    <td>{{$productDetailGet->usage_area}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kol Sayısı</th>
                                    <td>{{$productDetailGet->kol_sayisi}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Malzeme</th>
                                    <td>{{$productDetailGet->material}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">En</th>
                                    <td>{{$productDetailGet->width}}&quot;</td>
                                </tr>
                                <tr>
                                    <th scope="row">Boy</th>
                                    <td>{{$productDetailGet->height}}&quot;</td>
                                </tr>
                                <tr>
                                    <th scope="row">Yükseklik</th>
                                    <td>{{$productDetailGet->length}}&quot;</td>
                                </tr>
                                <tr>
                                    <th scope="row">Ağırlık</th>
                                    <td>{{$productDetailGet->kg}} KG</td>
                                </tr>
                                <tr>
                                    <th scope="row">Garanti</th>
                                    <td>{{$productDetailGet->warranty_period}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Katalog Yılı</th>
                                    <td>{{$productDetailGet->catalog_year}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Marka</th>
                                    <td>{{$productDetailGet->brand}}</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="title-wrap text-center">
                <h2 class="h1-style">You may also like</h2>
                <div class="carousel-arrows carousel-arrows--center"></div>
            </div>
            <div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2"
                 data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                    <div class="prd-inside">
                        <div class="prd-img-area">
                            <a href="product.html" class="prd-img image-hover-scale image-container">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-06-1.jpg" alt="Midi Dress with Belt" class="js-prd-img lazyload fade-up">
                                <div class="foxic-loader"></div>
                                <div class="prd-big-squared-labels">



                                </div>
                            </a>
                            <div class="prd-circle-labels">
                                <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>

                                <div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">
                                    <i class="icon-palette"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>
                                    <ul>
                                        <li data-image="images/skins/fashion/products/product-06-1.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-grey.png" alt=""></a></li>
                                        <li data-image="images/skins/fashion/products/product-06-color-2.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-green.png" alt=""></a></li>
                                        <li data-image="images/skins/fashion/products/product-06-color-3.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-black.png" alt=""></a></li>
                                    </ul>
                                </div>

                            </div>

                            <ul class="list-options color-swatch">
                                <li data-image="images/skins/fashion/products/product-06-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-06-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>

                                <li data-image="images/skins/fashion/products/product-06-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-06-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>


                                <li data-image="images/skins/fashion/products/product-06-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-06-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>



                            </ul>

                        </div>
                        <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-info-top">
                                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                </div>
                                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                <div class="prd-tag"><a href="#">Seiko</a></div>
                                <h2 class="prd-title"><a href="product.html">Midi Dress with Belt</a></h2>
                                <div class="prd-description">
                                    Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                </div>
                                <div class="prd-action">
                                    <form action="#">
                                        <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                    <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">

                                    <div class="price-new">$ 180</div>
                                </div>
                                <div class="prd-action">
                                    <div class="prd-action-left">
                                        <form action="#">
                                            <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                    <div class="prd-inside">
                        <div class="prd-img-area">
                            <a href="product.html" class="prd-img image-hover-scale image-container">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-17-1.jpg" alt="Stand Collar Shirt" class="js-prd-img lazyload fade-up">
                                <div class="foxic-loader"></div>
                                <div class="prd-big-squared-labels">


                                    <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>

                                        <div class="countdown-circle">
                                            <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                                        </div>

                                    </div>


                                </div>
                            </a>
                            <div class="prd-circle-labels">
                                <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>

                            </div>

                            <ul class="list-options color-swatch">
                                <li data-image="images/skins/fashion/products/product-17-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-17-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>

                                <li data-image="images/skins/fashion/products/product-17-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-17-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>


                                <li data-image="images/skins/fashion/products/product-17-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-17-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>



                            </ul>

                        </div>
                        <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-info-top">
                                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                </div>
                                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                <h2 class="prd-title"><a href="product.html">Stand Collar Shirt</a></h2>
                                <div class="prd-description">
                                    Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                </div>
                                <div class="prd-action">
                                    <form action="#">
                                        <button class="btn js-prd-addtocart" data-product='{"name": "Stand Collar Shirt", "path":"images/skins/fashion/products/product-17-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                    <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">

                                    <div class="price-old">$ 200</div>

                                    <div class="price-new">$ 180</div>
                                </div>
                                <div class="prd-action">
                                    <div class="prd-action-left">
                                        <form action="#">
                                            <button class="btn js-prd-addtocart" data-product='{"name": "Stand Collar Shirt", "path":"images/skins/fashion/products/product-17-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                    <div class="prd-inside">
                        <div class="prd-img-area">
                            <a href="product.html" class="prd-img image-hover-scale image-container">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-21-1.jpg" alt="Genuine Leather Strap Watch" class="js-prd-img lazyload fade-up">
                                <div class="foxic-loader"></div>
                                <div class="prd-big-squared-labels">

                                    <div class="label-new"><span>New</span></div>



                                </div>
                            </a>
                            <div class="prd-circle-labels">
                                <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>

                            </div>

                            <ul class="list-options color-swatch">
                                <li data-image="images/skins/fashion/products/product-21-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-21-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>

                                <li data-image="images/skins/fashion/products/product-21-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-21-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>


                                <li data-image="images/skins/fashion/products/product-21-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-21-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>



                            </ul>

                        </div>
                        <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-info-top">
                                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                </div>
                                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                <h2 class="prd-title"><a href="product.html">Genuine Leather Strap Watch</a></h2>
                                <div class="prd-description">
                                    Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                </div>
                                <div class="prd-action">
                                    <form action="#">
                                        <button class="btn js-prd-addtocart" data-product='{"name": "Genuine Leather Strap Watch", "path":"images/skins/fashion/products/product-21-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                    <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">

                                    <div class="price-new">$ 180</div>
                                </div>
                                <div class="prd-action">
                                    <div class="prd-action-left">
                                        <form action="#">
                                            <button class="btn js-prd-addtocart" data-product='{"name": "Genuine Leather Strap Watch", "path":"images/skins/fashion/products/product-21-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                    <div class="prd-inside">
                        <div class="prd-img-area">
                            <a href="product.html" class="prd-img image-hover-scale image-container">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-26-1.jpg" alt="Pureboost Running Shoes" class="js-prd-img lazyload fade-up">
                                <div class="foxic-loader"></div>
                                <div class="prd-big-squared-labels">



                                </div>
                            </a>
                            <div class="prd-circle-labels">
                                <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>

                            </div>

                            <ul class="list-options color-swatch">
                                <li data-image="images/skins/fashion/products/product-26-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-26-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>

                                <li data-image="images/skins/fashion/products/product-26-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-26-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>


                                <li data-image="images/skins/fashion/products/product-26-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-26-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>



                            </ul>

                        </div>
                        <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-info-top">
                                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                </div>
                                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                <h2 class="prd-title"><a href="product.html">Pureboost Running Shoes</a></h2>
                                <div class="prd-description">
                                    Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                </div>
                                <div class="prd-action">
                                    <form action="#">
                                        <button class="btn js-prd-addtocart" data-product='{"name": "Pureboost Running Shoes", "path":"images/skins/fashion/products/product-26-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                    <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">

                                    <div class="price-new">$ 180</div>
                                </div>
                                <div class="prd-action">
                                    <div class="prd-action-left">
                                        <form action="#">
                                            <button class="btn js-prd-addtocart" data-product='{"name": "Pureboost Running Shoes", "path":"images/skins/fashion/products/product-26-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                    <div class="prd-inside">
                        <div class="prd-img-area">
                            <a href="product.html" class="prd-img image-hover-scale image-container">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-30-1.jpg" alt="Multiple Pocket Waist Pack" class="js-prd-img lazyload fade-up">
                                <div class="foxic-loader"></div>
                                <div class="prd-big-squared-labels">



                                </div>
                            </a>
                            <div class="prd-circle-labels">
                                <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>

                            </div>

                            <ul class="list-options color-swatch">
                                <li data-image="images/skins/fashion/products/product-30-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-30-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>

                                <li data-image="images/skins/fashion/products/product-30-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-30-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>


                                <li data-image="images/skins/fashion/products/product-30-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-30-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>



                            </ul>

                        </div>
                        <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-info-top">
                                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                </div>
                                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                <h2 class="prd-title"><a href="product.html">Multiple Pocket Waist Pack</a></h2>
                                <div class="prd-description">
                                    Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                </div>
                                <div class="prd-action">
                                    <form action="#">
                                        <button class="btn js-prd-addtocart" data-product='{"name": "Multiple Pocket Waist Pack", "path":"images/skins/fashion/products/product-30-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                    <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">

                                    <div class="price-new">$ 180</div>
                                </div>
                                <div class="prd-action">
                                    <div class="prd-action-left">
                                        <form action="#">
                                            <button class="btn js-prd-addtocart" data-product='{"name": "Multiple Pocket Waist Pack", "path":"images/skins/fashion/products/product-30-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
