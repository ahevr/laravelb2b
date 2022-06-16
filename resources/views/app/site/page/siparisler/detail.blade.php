@extends("app.site.sitemasterpage")
@section("title","Sipariş Detayları")
@section("description", "Ege Sedef Avize Ürünler")
@section("keywords", "avize,sedefavize,aydınlatma,aplik,lambader,salonavizesi,masalambası,ithalürünler")
@section("content")
    @foreach($data as $row)
        <div class="holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sipariş ID</label>
                            <input type="text" class="form-control" value="{{$row->id}}"  disabled>
                            <small class="form-text text-muted">Siparişin ID Bilgisi</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sipariş Numarası</label>
                            <input type="text" class="form-control" value="{{$row->order_no}}" disabled>
                            <small  class="form-text text-muted">Sipariş numarası</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Müşteri Adı ve Soyadı</label>
                            <input type="text" class="form-control" value="{{$row->adi}} {{$row->soyadi}}" disabled>
                            <small  class="form-text text-muted">Müşteri Adı ve Soyadı Bilgisi</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Müşteri Email</label>
                            <input type="text" class="form-control" value="{{$row->email}}" disabled>
                            <small  class="form-text text-muted">Müşteri Email Bilgisi</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sipariş Adresi</label>
                            <input type="text" class="form-control" value="{{$row->adres}}" disabled>
                            <small  class="form-text text-muted">Sipariş Adresi Bilgisi</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sipariş Tarihi</label>
                            <input type="text" class="form-control" value="{{$row->created_at}}" disabled>
                            <small  class="form-text text-muted">Sipariş Tarihi Bilgisi</small>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h2 class="mb-3">Sipariş Detayları</h2>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr class="text-center">
                            <th width="20">Görsel</th>
                            <th width="20">Ürün Adı</th>
                            <th width="20">Sipariş Tarihi</th>
                            <th width="20">Liste Fiyatı</th>
                            <th width="20">İsk</th>
                            <th width="20">KDV</th>
                            <th width="20">Toplam</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($sip as $row)
                                <tr class="text-center">
                                    <td><img src="{{asset("app/admin/uploads/urunler/".$row->image)}}" width="80" alt=""> </td>
                                    <td><b class="text-success"><a href="{{route("site.urunler.detail",$row->product->product_url)}}">{{$row->product->product_name}}</a></b></td>
                                    <td>{{$row->created_at}}</td>
                                    <td>{{number_format($row->fiyat,2,',','.') }} TL</td>
                                    <td>{{Auth::guard("bayi")->user()->bayi_isk1 ."+". Auth::guard("bayi")->user()->bayi_isk2}}</td>
                                    <td>18%</td>
                                    <td>
                                        <?php
                                        $isk1 = $row->fiyat * Auth::guard("bayi")->user()->bayi_isk1 / 100 ;
                                        $isk2 = $row->fiyat - $isk1;
                                        $indirimHesapla2 = $isk2 * Auth::guard("bayi")->user()->bayi_isk2 / 100 ;
                                        $genelToplam2 = $isk2 - $indirimHesapla2;
                                        $kdv2 = $genelToplam2 * Auth::guard("bayi")->user()->bayi_kdv ;
                                        ?>
                                            {{ number_format($kdv2,2,',','.')}} TL
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <td colspan="1"><b>İSKONTO:</b></td>
                            <td>{{Auth::guard("bayi")->user()->bayi_isk1 ."+".Auth::guard("bayi")->user()->bayi_isk2 }}</td>
                            <td colspan="1"><b>KDV:</b></td>
                            <td>18%</td>
                            <td colspan="2"><b>Toplam</b></td>
                            <td><b>{{ number_format($row->order->total_price,2,',','.')}}</b>  TL</td>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>

    @endforeach

@endsection
