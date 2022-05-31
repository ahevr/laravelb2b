@extends("app.admin.masterpage")
@section("title","Bayiler | B2B Ege Sedef Aydınlatma")
@section("pageHeading")
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Bayi Yönetim Paneli</h3>
                <p class="text-subtitle text-muted">Ege Sedef Aydınlatma b2b Yönetim Paneli</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
                        <li class="breadcrumb-item disabled">Bayiler</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")
    @if(count($bayi) == 0 )
        <div class="alert alert-danger text-center" role="alert">
            Herhangi bir kayıt bulunamadı. <a href="{{route("admin.bayi.create")}}" class="alert-link">Buradan</a> yeni bir kayıt oluşturabilirsiniz.
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <div class="card-title" style="float: right">
                    <a href="{{route("admin.bayi.create")}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Yeni Oluştur</a>
                </div>
                <h4 class="card-title">Bayi Listesi</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Bayi Adı</th>
                                <th>Bayi Kodu</th>
                                <th>Bayi İskontosu</th>
                                <th>Bayi KDV</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bayi as $bayiRow)
                                <tr>
                                    <td>{{$bayiRow->id}}</td>
                                    <td>{{$bayiRow->bayi_adi}}</td>
                                    <td>{{$bayiRow->bayi_kodu}}</td>
                                    <td><b>{{$bayiRow->bayi_isk1}} +  {{$bayiRow->bayi_isk2}}</b></td>
                                    <td><b>{{$bayiRow->bayi_kdv}}</b></td>
                                    <td>
                                        <button
                                            data-url="{{route("admin.bayi.delete",$bayiRow)}}"
                                            class="btn btn-danger silButton">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <a href="{{route("admin.bayi.edit",$bayiRow)}}"
                                           class="btn btn-primary">
                                            <i class="fa-solid fa-edit"></i>
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
