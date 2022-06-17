@extends("app.admin.masterpage")
@section("title","Siparişler | B2B Ege Sedef Aydınlatma")
@section("pageHeading")
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Sipariş Yönetim Paneli</h3>
                <p class="text-subtitle text-muted">Ege Sedef Aydınlatma b2b Yönetim Paneli</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
                        <li class="breadcrumb-item disabled">Siparişler</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")

    @if(count($orders) == 0 )
        <div class="alert alert-info">
            <strong>Uyarı!</strong> Henüz sipariş yok.
    @else
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Siparişler Listesi</h1>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-lg table-responsive">
                                    <thead>
                                        <th scope="col">Bayi Adı</th>
                                        <th scope="col">Sipariş No</th>
                                        <th scope="col">Toplam Fiyat</th>
                                        <th scope="col">Sipariş Tarihi</th>
                                        <th scope="col">Detaylar</th>
                                        <th scope="col">PDF</th>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $row)
                                        <tr>
                                            <th scope="row">{{ substr($row->bayi->bayi_adi,0,30) }}...</th>
                                            <th scope="row">#SDF-{{$row->order_no}}-{{date("Y")}}</th>
                                            <td><b>{{number_format($row->total_price,2,',','.')}}</b> TL</td>
                                            <td>{{$row->created_at}}</td>
                                            <td>
                                                <a href="{{route("admin.orders.detail",$row)}}"
                                                   class="btn btn-primary"><i class="fa-solid fa-eye"></i>
                                                </a>
                                            </td>
                                            <td> <a href="{{route("admin.orders.downloadPDF",$row)}}"  class="btn btn-primary"><i class="fa-solid fa-file-pdf"></i></a></td>
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
