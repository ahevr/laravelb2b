@extends("app.site.sitemasterpage")
@section("title","Cari Hesabım")
@section("description", "Ege Sedef Avize Ürünler")
@section("keywords", "avize,sedefavize,aydınlatma,aplik,lambader,salonavizesi,masalambası,ithalürünler")
@section("content")
    @if(count($cari) == 0 )
        <h5 class="fw-bolder">Herhangi Bir Cari Bilginiz Yok </h5>
    @else
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="{{route("site.index")}}">Ana Sayfa</a></li>
                    <li><span>Cari Bilgilerim</span></li>
                </ul>
            </div>
        </div>
        <div class="holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-18 aside">
                        <h1 class="mb-3">Cari Hesap Detaylarım</h1>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-order-history">
                                <thead>
                                <tr>
                                    <th>fis_no</th>
                                    <th>Açıklama</th>
                                    <th>vade_tarihi</th>
                                    <th>borc_tutari</th>
                                    <th>alacak_tutari</th>
                                    <th>borc_bakiye</th>
                                    <th>alacak_bakiye</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cari as $row)
                                    <tr class="text-center">
                                        <td>{{$row->fis_no}}</td>
                                        <td>{{$row->desc}}</td>
                                        <td>{{$row->vade_tarihi}}</td>
                                        <td>{{number_format($row->borc_tutari,2,'.',',') }}</td>
                                        <td>{{$row->alacak_tutari}}</td>
                                        <td>{{$row->borc_bakiye}}</td>
                                        <td>{{$row->alacak_bakiye}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    @php($toplam=0)
                                    @foreach($cari as $row)
                                        @php($toplam+= $row->borc_tutari)
                                    @endforeach
                                    <td colspan="3">Toplam</td>
                                    <td>{{number_format($toplam,2)}}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    @endif
@endsection
