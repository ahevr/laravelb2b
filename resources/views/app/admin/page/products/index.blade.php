@extends("app.admin.masterpage")
@section("title","Ürünler | B2B Ege Sedef Aydınlatma")
@section("pageHeading")
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ürün Yönetim Paneli</h3>
                <p class="text-subtitle text-muted">Ege Sedef Aydınlatma b2b Yönetim Paneli</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
                        <li class="breadcrumb-item disabled">Ürünler</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")
<div class="col-md-12">
    @if(count($products) == 0 )
        <div class="alert alert-warning" role="alert">
            Herhangi bir kayıt bulunamadı. <a href="{{route("admin.products.create")}}" class="alert-link">Buradan</a> yeni bir kayıt oluşturabilirsiniz.
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <div class="card-title" style="float: right">
                    <a href="{{route("admin.products.create")}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Yeni Oluştur</a>
                </div>
                <h4 class="card-title">Ürünler Listesi</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Görsel</th>
                                <th>Ürün Adı</th>
                                <th>Fiyat</th>
                                <th>Aktif/Pasif</th>
                                <th>Yeni/Eski</th>
                                <th>Fiyat Göster</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $productRow)
                            <tr>
                                <td class="text-bold-500">{{$productRow->id}}</td>
                                <td><img src="{{asset("app/admin/uploads/urunler/".$productRow->image)}}" width="100" alt="{{$productRow->product_name}}"></td>
                                <td>{{$productRow->product_name}}</td>
                                <td><b>{{number_format($productRow->price,2,',','.') }}</b> TL</td>
                                <td>
                                    <?php if ($productRow->isActive == "1"){ ?>
                                    <a href="{{route("admin.products.status",$productRow)}}" class="badge rounded-pill alert-success">Aktif</a>
                                    <?php } else { ?>
                                    <a href="{{route("admin.products.status",$productRow)}}" class="badge rounded-pill alert-danger">Pasif</a>
                                    <?php  } ?>
                                </td>
                                <td>
                                    <?php if ($productRow->isNew == "1"){ ?>
                                    <a href="{{route("admin.products.isnewStatus",$productRow)}}" class="badge rounded-pill alert-primary">Yeni</a>
                                    <?php } else { ?>
                                    <a href="{{route("admin.products.isnewStatus",$productRow)}}" class="badge rounded-pill alert-danger">Eski</a>
                                    <?php  } ?>
                                </td>
                                <td>
                                    <?php if ($productRow->isFyt == "1"){ ?>
                                    <a href="{{route("admin.products.isfytStatus",$productRow)}}" class="badge rounded-pill alert-info">Açık</a>
                                    <?php } else { ?>
                                    <a href="{{route("admin.products.isfytStatus",$productRow)}}" class="badge rounded-pill alert-danger">Kapalı</a>
                                    <?php  } ?>
                                </td>
                                <td>
                                    <button
                                            data-url="{{route("admin.products.deleteproducts",$productRow)}}"
                                            class="btn btn-danger silButton">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <a href="{{route("admin.products.edit",$productRow)}}"
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
</div>
@endsection
