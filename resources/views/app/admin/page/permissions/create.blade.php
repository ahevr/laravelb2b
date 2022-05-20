@extends("app.admin.masterpage")
@section("title","İzin Oluştur | B2B Ege Sedef Aydınlatma")
@section("pageHeading")
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Rol İzin Yönetim Paneli</h3>
                <p class="text-subtitle text-muted">Ege Sedef Aydınlatma b2b Yönetim Paneli</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route("admin.role.index")}}">Rol İzinleri</a></li>
                        <li class="breadcrumb-item disabled">Rol İzini Ekle</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")
    <section class="section">
        <div class="row">
            <form action="{{route("admin.permission.store")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">İzin Adı</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="İzin Adı"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success">Kaydet</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
