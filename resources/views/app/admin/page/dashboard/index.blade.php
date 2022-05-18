@extends("app.admin.masterpage")
@section("title","Dashboard | B2B Ege Sedef Aydınlatma")
@section("pageHeading")
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Yönetim Paneli</h3>
                <p class="text-subtitle text-muted">Ege Sedef Aydınlatma b2b Yönetim Paneli</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")
    <div class="card">
        <div class="row">
            <div class="col-md-9">
                <div class="card-header">
                    <h4 class="card-title">Kategori Yönetimi</h4>
                    <small><b>Kategorilere Gitmek İçin <a href="{{route("admin.categories.index")}}">Tıklayınız</a> </b></small>
                </div>
                <div class="row">
                    @foreach($categories as $rowCountCategory)
                        <div class="col-6 col-lg-3 col-md-6">

                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">{{$rowCountCategory->name}}</h6>

                                            @if($rowCountCategory->category_id->count() > 0 )
                                                <h6 class="font-extrabold mb-0">{{$rowCountCategory->category_id->count()}} Adet  </h6>
                                            @else
                                                <div class="price-new">Veri Yok !!</div>
                                            @endif


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="{{asset("app/admin")}}/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{Auth::user()->name}}</h5>
                                <h6 class="text-muted mb-0">{{Auth::user()->email}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-9">
                <div class="card-header">
                    <h4 class="card-title">Ürün Yönetimi</h4>
                    <small><b>Ürünlere Gitmek İçin <a href="{{route("admin.products.index")}}">Tıklayınız</a> </b></small>
                </div>
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Toplam Ürün</h6>
                                            <h6 class="font-extrabold mb-0">{{$productCount}} Adet</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
