@extends("app.site.sitemasterpage")
@section("title","Sepet")
@section("description", "Ege Sedef Avize Sepetim")
@section("keywords", "avize,sedefavize,aydınlatma,aplik,lambader,salonavizesi,masalambası,ithalürünler")
@section("content")
    @if(count(Cart::instance('shopping')->content())>0)
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="{{route("site.index")}}">Ana Sayfa</a></li>
                    <li><span>Sepetim</span></li>
                </ul>
            </div>
        </div>
        <div class="holder">
            <div class="container">
                <div class="page-title text-center">
                    <h1>Sepetim</h1>
                </div>
                <div class="row">
                    <div class="col-lg-11 col-xl-13">
                        <div class="cart-table">
                            <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                                <div class="cart-table-prd-image text-center">
                                    Görsel
                                </div>
                                <div class="cart-table-prd-content-wrap">
                                    <div class="cart-table-prd-info">Ürün</div>
                                    <div class="cart-table-prd-qty">Adet</div>
                                    <div class="cart-table-prd-price">Liste Fiyatı</div>
                                    <div class="cart-table-prd-action">&nbsp;</div>
                                </div>
                            </div>
                            @foreach(Cart::instance('shopping')->content() as $productCartItem)
                                <div class="cart-table-prd">
                                <div class="cart-table-prd-image">
                                    <a href="{{route("site.urunler.detail",$productCartItem->options->product_url)}}" class="prd-img">
                                        <img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                             data-src="{{asset("app/admin/uploads/urunler")}}/{{$productCartItem->options->image}}" alt="{{$productCartItem->name}}">
                                    </a>
                                </div>
                                <div class="cart-table-prd-content-wrap">
                                    <div class="cart-table-prd-info">
                                        <div class="cart-table-prd-price">
                                            <div class="price-old">$200.00</div>
                                            <div class="price-new">$180.00</div>
                                        </div>
                                        <h2 class="cart-table-prd-name"><a href="{{route("site.urunler.detail",$productCartItem->options->product_url)}}">{{$productCartItem->name}}</a></h2>
                                    </div>
                                    <div class="cart-table-prd-qty">
                                        <div class="qty qty-changer">
                                            <button class="decrease"></button>
                                            <input
                                                type="number"
                                                min="1"
                                                max="10"
                                                name="qty"
                                                step="1"
                                                class="form-control text-center updateCart"
                                                data-id="{{$productCartItem->rowId}}"
                                                data-ada="{{$productCartItem->rowId}}"
                                                value="{{$productCartItem->qty}}"
                                            >
                                            <button class="increase"></button>
                                        </div>
                                    </div>
                                    <div class="cart-table-prd-price-total">
                                        {{number_format($productCartItem->subtotal,2,",",".")}} TL
                                        <p style="font-size: 10px">(kdv dahil değildir)</p>
                                    </div>
                                </div>
                                <div class="cardRemove">
                                    <form action="{{route("site.card.sepetadetsil",$productCartItem->rowId)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger" data-tooltip="Remove Product"><i class="icon-recycle"></i></button>
                                    </form>
                                </div>
                            </div>
                            @endforeach


                        </div>

                    </div>
                    <div class="col-lg-7 col-xl-5 mt-3 mt-md-0">
                        <div class="card-total">
                            <div class="row d-flex">
                                <div class="col card-total-txt">
                                    <small>İskonto + KDV</small>
                                </div>
                                <div class="col-auto card-total-price text-right">
                                    <span><small>{{Auth::guard("bayi")->user()->bayi_isk1 ."+". Auth::guard("bayi")->user()->bayi_isk2}}</small></span>

                                </div>
                            </div>
                            <div class="row d-flex">
                                <div class="col card-total-txt">
                                    Toplam
                                </div>
                                <?php
                                $isk1 = Cart::totalFloat() * Auth::guard("bayi")->user()->bayi_isk1 / 100 ;
                                $isk2 = Cart::totalFloat() - $isk1;
                                $indirimHesapla2 = $isk2 * Auth::guard("bayi")->user()->bayi_isk2 / 100 ;
                                $genelToplam2 = $isk2 - $indirimHesapla2;
                                ?>
                                <div class="col-auto card-total-price text-right">
                                    {{ number_format($genelToplam2,2,',','.')}} <small> TL</small>
                                </div>
                            </div>
                            <a href="{{route("site.order.index")}}" class="btn btn--full btn--lg">Sepeti Onayla</a>
                            <div class="card-text-info text-right">
                                <h5>Standart Kargo</h5>
                                <p><b>1-3 İş Günü</b><br>İçerisinde MNG Kargo İle Tarafınıza Gönderim Sağlanacaktır.</p>
                            </div>
                        </div>
                        <div class="mt-2"></div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>  <b>Sepetinde ürün bulunmamaktadır.</b>
                <a href="{{route("site.index")}}" class="btn btn-lg btn-warning pull-right text-white">Alışverişe Başla</a>
            </div>
        </div>
    @endif
@endsection
