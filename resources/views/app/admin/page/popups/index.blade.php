@extends("app.admin.masterpage")
@section("title","Ürünler | B2B Ege Sedef Aydınlatma")
@section("pageHeading")
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Popups Yönetim Paneli</h3>
                <p class="text-subtitle text-muted">Ege Sedef Aydınlatma b2b Yönetim Paneli</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
                        <li class="breadcrumb-item disabled">Popups</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")
    <div class="col-md-12">
        @if(count($popups) == 0 )
            <div class="alert alert-warning" role="alert">
                Herhangi bir kayıt bulunamadı.
                <a class="btn btn-primary" href="{{route("admin.popups.create")}}"><i class="fa-solid fa-plus"></i> Popups Ekle</a>
            </div>
        @else

            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Popups Listesi</h1>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary" href="{{route("admin.popups.create")}}"><i class="fa-solid fa-plus"></i> Popups Ekle</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Popups Başlığı</th>
                                    <th>Slider Açıklaması</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($popups as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->desc}}</td>
                                        <td>
                                            <a href="{{route("admin.popups.delete",$item->id)}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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
    </div>



@endsection
