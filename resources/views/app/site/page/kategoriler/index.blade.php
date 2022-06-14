@extends("app.site.sitemasterpage")
@section('title', "Ürünler")
@section("content")
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{route("site.index")}}">Ana Sayfa</a></li>
                <li><a href="{{route("site.urunler.index")}}">Ürünler</a></li>
                <li><span>Kategoriler</span></li>
                <li><a href="{{route("site.index")}}">{{$categoriess->name}}</a></li>
            </ul>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <!-- Two columns -->
            <!-- Page Title -->
            <div class="page-title text-center">
                <h1>{{$categoriess->name}}</h1>
            </div>
            <!-- /Page Title -->
            <!-- /Filter Row -->
            <div class="row">
                <!-- Left column -->
                <div class="col-lg-4 aside aside--left filter-col filter-mobile-col filter-col--sticky js-filter-col filter-col--opened-desktop"
                     data-grid-tab-content>
                    <div class="filter-col-content filter-mobile-content">
                        <div class="sidebar-block filter-group-block open">
                            <div class="sidebar-block_title">
                                <span>Kategoriler</span>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="sidebar-block_content">
                                <ul class="category-list">
                                    @foreach($categories as $category)
                                        <div class="form-group">
                                            <label for="artisan"> <b>{{$category->name}}</b></label>
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
                        <!-- Products Grid -->
                        @if(count($product) == 0 )
                            <div class="prd-grid-wrap">
                                <div class="page404-bg">
                                    <div class="page404-text">
                                        <div class="txt3"><i class="icon-shopping-bag"></i></div>
                                        <div class="txt4">Bu Kategoride Herhangi <br>Bir Ürün Yok</div>
                                    </div>
                                    <svg class="blob" id="morphing" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
                                        <g transform="translate(50,50)">
                                            <path class="p" d="M93.5441 2.30824C127.414 -1.02781 167.142 -4.63212 188.625 21.7114C210.22 48.1931 199.088 86.5178 188.761 119.068C179.736 147.517 162.617 171.844 136.426 186.243C108.079 201.828 73.804 212.713 44.915 198.152C16.4428 183.802 6.66731 149.747 1.64848 118.312C-2.87856 89.9563 1.56309 60.9032 19.4066 38.3787C37.3451 15.7342 64.7587 5.14348 93.5441 2.30824Z"/>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        @endif
                        <div class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid" data-grid-tab-content>
                            @foreach($product as $row)
                                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                    <div class="prd-inside">
                                        <div class="prd-img-area">
                                            <a href="{{route("site.urunler.detail",$row->product_url)}}" class="prd-img image-hover-scale image-container">
                                                <img
                                                    @if(isset($row->image))
                                                        data-src="{{asset("app/admin/uploads/urunler/".$row->image)}}"
                                                    @$row
                                                        data-src="{{asset("app/site")}}/images/skins/fashion/products/product-06-1.jpg"
                                                    @endif
                                                    alt="{{$row->product_name}}"
                                                    class="js-prd-img lazyload fade-up">
                                                <div class="foxic-loader"></div>
                                                <div class="prd-big-squared-labels">

                                                    @if($row->isNew > 0)
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
                                                <div class="prd-tag"><a href="#">{{$row->category->name}}</a></div>
                                                <h2 class="prd-title"><a href="{{route("site.urunler.detail",$row->product_url)}}">{{$row->product_name}}</a></h2>
                                            </div>
                                            <div class="prd-hovers">
                                                <div class="prd-price">

                                                    <div class="price-old">{{number_format($row->total_price,2,',','.') }} TL</div>
                                                    <div class="price-new">
                                                        <td>
                                                            <b>
                                                                <?php
                                                                $isk1 = $row->total_price * Auth::guard("bayi")->user()->bayi_isk1 / 100 ;
                                                                $isk2 = $row->total_price - $isk1;
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
                                                        <a href="{{route("site.urunler.detail",$row->product_url)}}" class="btn js-prd-addtocart">Ürüne Git</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="listing-show-more-wrap d-flex mt-4 mt-md-6 justify-content-center align-items-start">
                        <ul class="pagination mt-0">
                            @if  (request()->has('sort') && !empty(request()->get("sort")))

                                {{$product->appends(["sort" => request()->get("sort") ])->links()}}
                            @else
                                {{$product->onEachSide(0)->links()}}

                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
