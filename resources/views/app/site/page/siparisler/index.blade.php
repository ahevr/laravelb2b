@extends("app.site.sitemasterpage")
@section("title","Hesabım")
@section("description", "Ege Sedef Avize Ürünler")
@section("keywords", "avize,sedefavize,aydınlatma,aplik,lambader,salonavizesi,masalambası,ithalürünler")
@section("content")
    @if(count($sip) == 0 )
        <h5 class="fw-bolder">Herhangi Bir Siparişiniz Yok </h5>
    @else
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="index.html">Home</a></li>
                    <li><span>My account</span></li>
                </ul>
            </div>
        </div>
        <div class="holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-18 aside">
                        <h1 class="mb-3">Siparişlerim</h1>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-order-history">
                                <thead>
                                <tr>
                                    <th scope="col">Sipariş Tarihi</th>
                                    <th scope="col">Siparis Adı ve Soyadı </th>
                                    <th scope="col">Siparis Numarası</th>
                                    <th scope="col">Toplam Fiyat</th>
                                    <th scope="col">Detaylar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sip as $row)
                                    <tr class="text-center">
                                        <td>{{$row->created_at}}</td>
                                        <td>{{$row->adi}} {{$row->soyadi}}</td>
                                        <td>#SDF-{{$row->order_no}}-{{date('Y')}}</td>
                                        <td><b>{{number_format($row->total_price,2,'.',',')}}</b> TL</td>
                                        <td> <a href="{{route("site.order.siparislerimDetay",$row->id)}}"
                                                class="btn btn-sm btn-warning"><i class="icon-eye" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    @endif
@endsection
