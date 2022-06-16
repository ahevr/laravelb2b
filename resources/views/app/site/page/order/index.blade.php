@extends("app.site.sitemasterpage")
@section("title","Siparişlerim")
@section("description", "Ege Sedef Avize Sepetim")
@section("keywords", "avize,sedefavize,aydınlatma,aplik,lambader,salonavizesi,masalambası,ithalürünler")
@section("content")
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{route("site.index")}}">Ana Sayfa</a></li>
                <li><span>Sipariş</span></li>
            </ul>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="holder">
        <div class="container">
            <h1 class="text-center">Sipariş Özeti</h1>
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group panel-group--style1" id="checkoutAccordion">
                        <div class="panel">
                            <div class="panel-heading active">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#step1">Adres Bilgileri</a>
                                    <span class="toggle-arrow"><span></span><span></span></span>
                                </h4>
                            </div>
                            <div id="step1" data-parent="#checkoutAccordion" class="panel-collapse collapse show">
                                <form action="{{route("site.order.siparisekle")}}" method="POST">
                                    @csrf
                                    <div class="panel-body">
                                        <div class="panel-body-inside">
                                            <div class="row mt-2">
                                                <div class="col-sm-9">
                                                    <label>Ad:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="adi" class="form-control form-control--sm">
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <label>Soyadı:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="soyadi" class="form-control form-control--sm">
                                                    </div>
                                                </div>
                                            </div>
                                            <label>Email Adresi:</label>
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control form-control--sm">
                                            </div>
                                            <div class="mt-2"></div>
                                            <label>İl:</label>
                                            <div class="form-group">
                                                <input type="text" name="il" class="form-control form-control--sm">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <label>ilçe:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="ilce" class="form-control form-control--sm">
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <label>Adres:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="adres" class="form-control form-control--sm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2"></div>
                                            <label>Telefon:</label>
                                            <div class="form-group">
                                                <input type="text" name="telefon" class="form-control form-control--sm">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn--full btn--lg mt-5">Sepeti Onayla</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 pl-lg-8 mt-2 mt-md-0">
                    <h2 class="custom-color">Sipariş Bilgileri</h2>
                    <div class="cart-table cart-table--sm pt-3 pt-md-0">
                        <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                            <div class="cart-table-prd-image text-center">Görsel</div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">Ürün</div>
                                <div class="cart-table-prd-qty">Adet</div>
                                <div class="cart-table-prd-price">Liste Fiyatı</div>
                            </div>
                        </div>
                        @foreach(Cart::instance('shopping')->content() as $CartItem)
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-image">
                                    <a href="#" class="prd-img">
                                        <img class="lazyload fade-up"
                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                             data-src="{{asset("app/admin/uploads/urunler")}}/{{$CartItem->options->image}}"
                                             alt="{{$CartItem->name}}">
                                    </a>
                                </div>
                                <div class="cart-table-prd-content-wrap">
                                    <div class="cart-table-prd-info">
                                        <h2 class="cart-table-prd-name"><a href="{{route("site.urunler.detail",$CartItem->options->product_url)}}">{{$CartItem->name}}</a></h2>
                                    </div>
                                    <div class="cart-table-prd-qty">
                                        <div class="qty qty-changer">
                                            <input type="number" class="qty-input " value="{{$CartItem->qty}}"disabled>
                                        </div>
                                    </div>
                                    <div class="cart-table-prd-price-total">
                                        {{number_format($CartItem->price,2,',','.') }} TL
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="mt-2"></div>
                    <div class="mt-2"></div>
                    <table>
                        <thead>
                        <tr>
                            <th scope="col">Ara Toplam</th>
                            <th scope="col">KDV</th>
                            <th scope="col">Toplam Fiyat</th>
                            <th scope="col">İsk</th>
                            <th scope="col">KDV</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{Cart::instance('shopping')->subtotal()}}</td>
                            <td>{{Cart::instance('shopping')->tax()}}</td>
                            <td>{{Cart::instance('shopping')->total()}}</td>
                            <td>{{Auth::guard("bayi")->user()->bayi_isk1 ."+".Auth::guard("bayi")->user()->bayi_isk2}}</td>
                            <td>18%</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="cart-total-sm">
                        <span> <b>Toplam</b> </span>
                        <span class="card-total-price">
                             <?php
                                $isk1 = Cart::totalFloat() * Auth::guard("bayi")->user()->bayi_isk1 / 100 ;
                                $isk2 = Cart::totalFloat() - $isk1;
                                $indirimHesapla2 = $isk2 * Auth::guard("bayi")->user()->bayi_isk2 / 100 ;
                                $genelToplam2 = $isk2 - $indirimHesapla2;
                            ?>
                            {{ number_format($genelToplam2,2,',','.')}} <small> TL</small>
                        </span>
                    </div>
                    <div class="mt-2"></div>
                    <div class="card">
                        <div class="card-body">
                            <h3>Fiyatlandırma Bilgisi</h3>
                            <p> Merhaba Hoşgeldiniz, <b>{{ substr(Auth::guard("bayi")->user()->bayi_adi,0,30) }}...</b>
                                <br>   Fiyatlandırma Çalışma Şekliniz Olan
                                <b>{{Auth::guard("bayi")->user()->bayi_isk1 ."+". Auth::guard("bayi")->user()->bayi_isk2 }} + {{Auth::guard("bayi")->user()->bayi_kdv}}% KDV </b>şeklinde hesaplanmıştır.  </p>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                </div>
            </div>
        </div>
    </div>


@endsection
