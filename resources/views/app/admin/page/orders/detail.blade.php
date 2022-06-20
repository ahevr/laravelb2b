@extends("app.admin.masterpage")
@section("title","Sipariş Detayları | B2B Ege Sedef Aydınlatma")
@section("pageHeading")
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="helpInputTop">Sipariş Detayları</h3>
                <p class="text-subtitle text-muted">Ege Sedef Aydınlatma b2b Yönetim Paneli</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route("admin.orders.index")}}">Siparişler</a></li>
                        <li class="breadcrumb-item disabled">Siparis Detayları</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")

    <section class="content-main">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>{{$orders->bayi->bayi_adi}} Ait Sipariş Detayları</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sipariş ID</label>
                                    <input type="text" class="form-control" value="{{$orders->id}}"  disabled>
                                    <small class="form-text text-muted">Siparişin ID Bilgisi</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sipariş Numarası</label>
                                    <input type="text" class="form-control" value="#SDF-{{$orders->order_no}}-{{date("Y")}}"  disabled>
                                    <small class="form-text text-muted">Siparişin ID Bilgisi</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bayi Adı</label>
                                    <input type="text" class="form-control" value="{{$orders->bayi->bayi_adi}}" disabled>
                                    <small  class="form-text text-muted">Müşteri Adı ve Soyadı Bilgisi</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Müşteri Email</label>
                                    <input type="text" class="form-control" value="{{$orders->bayi->bayi_email}}" disabled>
                                    <small  class="form-text text-muted">Müşteri Email Bilgisi</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sipariş Adresi</label>
                                    <input type="text" class="form-control" value="{{$orders->adres}}" disabled>
                                    <small  class="form-text text-muted">Sipariş Adresi Bilgisi</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sipariş Tarihi</label>
                                    <input type="text" class="form-control" value="{{$orders->created_at}}" disabled>
                                    <small  class="form-text text-muted">Sipariş Tarihi Bilgisi</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr class="text-center">
                                    <th width="20">#</th>
                                    <th width="20">Görsel</th>
                                    <th width="20">Ürün Adı</th>
                                    <th width="20">Adet</th>
                                    <th width="20">Liste Fiyatı</th>
                                    <th width="20">İskonto</th>
                                    <th width="20">Genel Toplam</th>
                                    <th width="20">Sipariş Tarihi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sip as $row)
                                    <tr class="text-center">
                                        <td>{{$row->id}}</td>
                                        <td><img src="{{asset("app/admin/uploads/urunler/".$row->image)}}" width="80" alt=""> </td>
                                        <td><b class="text-success">{{$row->product->product_name}}</b></td>
                                        <td>{{$row->adet}}</td>
                                        <td><b class="text-danger">{{number_format($row->fiyat,2,',','.') }} TL</b></td>
                                        <td><b class="text-danger">{{$row->bayi->bayi_isk1 ."+".$row->bayi->bayi_isk2 }}</b></td>
                                        <td>
                                            <b class="text-danger">
                                                <?php
                                                $isk1 = $row->fiyat * Auth::guard("bayi")->user()->bayi_isk1 / 100 ;
                                                $isk2 = $row->fiyat - $isk1;
                                                $indirimHesapla2 = $isk2 * Auth::guard("bayi")->user()->bayi_isk2 / 100 ;
                                                $genelToplam2 = $isk2 - $indirimHesapla2;
                                                $kdv2 = $genelToplam2 * Auth::guard("bayi")->user()->bayi_kdv ;
                                                ?>
                                                {{ number_format($kdv2,2,',','.')}} TL
                                            </b>
                                        </td>
                                        <td>{{$row->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <td colspan="7"><b>Toplam</b></td>
                                <td><b>{{ number_format($row->order->total_price,2,',','.')}}</b>  TL</td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
