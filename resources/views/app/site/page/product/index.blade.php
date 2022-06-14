@extends("app.site.sitemasterpage")
@section("title","Ürünler")
@section("description", "Ege Sedef Avize Ürünler")
@section("keywords", "avize,sedefavize,aydınlatma,aplik,lambader,salonavizesi,masalambası,ithalürünler")
@section("content")
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{route("site.index")}}">Ana Sayfa</a></li>
                <li><span>Ürünler</span></li>
            </ul>
        </div>
    </div>

    <div class="holder">
        <div class="container">
            <div class="page-title text-center">
                <h1>Ürünler</h1>
            </div>
            <div class="filter-row">
                <div class="row">
                    <div class="items-count">{{$productCount}} ürün(s)</div>
                    <div class="select-wrap d-none d-md-flex">
                        <div class="select-label">Sırala:</div>
                        <form name="sortProducts" id="sortProducts">
                            <div class="select-wrapper select-wrapper-xxs" id="sorting">
                                <select class="form-control input-sm" name="sort" id="sort">
                                    <option value="0"><b>Sıralama Seç...</b></option>
                                    <option value="z_to_a"><b>Yeniden Eskiye</b></option>
                                    <option value="a_to_z"><b>Eskiden Yeniye</b></option>
                                    <option value="price_lowest"><b>Artan Fiyat</b></option>
                                    <option value="price_highest"><b>Azalan Fiyat</b></option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="viewmode-wrap">
                        <div class="view-mode">
                            <span class="js-horview d-none d-lg-inline-flex"><i class="icon-grid"></i></span>
                            <span class="js-gridview"><i class="icon-grid"></i></span>
                            <span class="js-listview"><i class="icon-list"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 aside aside--left filter-col filter-mobile-col filter-col--sticky js-filter-col filter-col--opened-desktop" data-grid-tab-content>
                    <div class="filter-col-content filter-mobile-content">
                        <div class="sidebar-block filter-group-block open">
                            <div class="sidebar-block_title">
                                <span>Kategoriler</span>
                                <span class="toggle-arrow">
                                    <span></span>
                                    <span></span>
                                </span>
                            </div>
                            <div class="sidebar-block_content">
                                <ul class="category-list">
                                    @foreach($categories as $category)
                                        <div class="form-group">
                                            <label for="artisan"> {{$category->name}}</label>
                                            @if(count($category->childs))
                                                @include('app.site.page.kategoriler.manageChildHome',['childs' => $category->childs])
                                            @endif
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg aside">
                    <div class="prd-grid-wrap">
                        <div class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid" data-grid-tab-content>
                            @foreach($productGetAll as $product)
                                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                    <div class="prd-inside">
                                        <div class="prd-img-area">
                                            <a href="{{route("site.urunler.detail",$product->product_url)}}" class="prd-img image-hover-scale image-container">
                                                <img
                                                    @if(isset($product->image))
                                                        data-src="{{asset("app/admin/uploads/urunler/".$product->image)}}"
                                                    @else
                                                        data-src="{{asset("app/site")}}/images/skins/fashion/products/product-06-1.jpg"
                                                    @endif
                                                    alt="{{$product->product_name}}"
                                                    class="js-prd-img lazyload fade-up">
                                                <div class="foxic-loader"></div>
                                                <div class="prd-big-squared-labels">

                                                    @if($product->isNew > 0)
                                                        <div class="label-new"><span>Yeni Ürün</span></div>
                                                    @endif


                                                    <div class="label-sale">
                                                        <span>{{Auth::guard("bayi")->user()->bayi_isk1 ." + ".Auth::guard("bayi")->user()->bayi_isk2}}
                                                            <span class="sale-text">İSK<small>+kdv</small> </span>
                                                        </span>
                                                    </div>

                                                </div>
                                            </a>
                                            <div class="prd-circle-labels">
                                                <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                   title="Favorilere Ekle">
                                                    <i class="icon-heart-stroke"></i>
                                                </a>
                                                <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                   title="Remove From Wishlist">
                                                    <i class="icon-heart-hover"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="prd-info">
                                            <div class="prd-info-wrap">
                                                <div class="prd-tag"><a href="#">{{$product->category->name}}</a></div>
                                                <h2 class="prd-title"><a href="{{route("site.urunler.detail",$product->product_url)}}">{{$product->product_name}}</a></h2>
                                            </div>
                                            <div class="prd-hovers">
                                                <div class="prd-price">

                                                    <div class="price-old">
                                                        <td><b>{{number_format($product->total_price,2,',','.') }}</b> TL</td>
                                                    </div>
                                                    <div class="price-new">
                                                        <td>
                                                            <b>
                                                                <?php
                                                                  $isk1 = $product->total_price * Auth::guard("bayi")->user()->bayi_isk1 / 100 ;
                                                                  $isk2 = $product->total_price - $isk1;
                                                                  $indirimHesapla2 = $isk2 * Auth::guard("bayi")->user()->bayi_isk2 / 100 ;
                                                                  $genelToplam2 = $isk2 - $indirimHesapla2;
                                                                  $kdv = $genelToplam2 * Auth::guard("bayi")->user()->bayi_kdv ;
                                                                ?>
                                                                {{ number_format($kdv,2,',','.')}}TL
                                                            </b>
                                                        </td>
                                                    </div>

                                                </div>
                                                <div class="prd-action">
                                                    <div class="prd-action-left">
                                                        <a href="{{route("site.urunler.detail",$product->product_url)}}" class="btn js-prd-addtocart">Ürüne Git</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="loader-horizontal-sm js-loader-horizontal-sm d-none" data-loader-horizontal style="opacity: 0;">
                            <span></span>
                        </div>
                        <div class="circle-loader-wrap">
                            <div class="listing-show-more-wrap d-flex mt-4 mt-md-6 justify-content-center align-items-start">
                                <ul class="pagination mt-0">
                                    @if  (request()->has('sort') && !empty(request()->get("sort")))

                                        {{$productGetAll->appends(["sort" => request()->get("sort") ])->links()}}
                                    @else
                                        {{$productGetAll->onEachSide(0)->links()}}
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
