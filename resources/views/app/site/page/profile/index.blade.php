@extends("app.site.sitemasterpage")
@section("title","Hesabım")
@section("description", "Ege Sedef Avize Ürünler")
@section("keywords", "avize,sedefavize,aydınlatma,aplik,lambader,salonavizesi,masalambası,ithalürünler")
@section("content")
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="{{route("site.index")}}">Ana Sayfa</a></li>
                    <li><span>Hesap Bilgierim</span></li>
                </ul>
            </div>
        </div>
        <div class="holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-18 aside">
                        <h1 class="mb-3">Hesap Bilgilerim</h1>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-order-history">
                                <thead>
                                <tr>
                                    <th scope="col">Bayi Adı</th>
                                    <th scope="col">Bayi Email </th>
                                    <th scope="col">Bayi Telefon</th>
                                    <th scope="col">Detaylar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bio as $row)
                                    <tr class="text-center">
                                        <td>{{$row->bayi_adi}}</td>
                                        <td>{{$row->bayi_email }}</td>
                                        <td>{{$row->bayi_telefon}}</td>
                                        <td> <a href="{{route("site.hesabim.hesabimDetay",$row)}}"
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



@endsection
