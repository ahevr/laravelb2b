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
            <a class="btn btn-primary" href="{{route("admin.products.create")}}"><i class="fa-solid fa-plus"></i> Ürün Ekle</a>
            <a class="btn btn-success" href="{{route('admin.products.file-export') }}"><i class="fa fa-file-excel"></i> Toplu Ürün İndir</a>
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file-excel"></i>
                Toplu Ürün Yükle
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Toplu Ürün Yükleme</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.products.file-import') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Excel Yükle</label>
                                    <input type="file" name="file" id="file"  class="form-control-file btn btn-success">
                                    <br>
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                <input type="submit" name="submit" value="Yükle" class="btn btn-danger" />
                            </form>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
                <a href="{{route("admin.products.deleteproductsAll")}}" class="btn btn-danger"> <i class="fa fa-trash"></i> Tüm Verileri Sil</a>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Ürünler Listesi</h1>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <a class="btn btn-primary m-3" href="{{route("admin.products.create")}}"><i class="fa-solid fa-plus"></i> Ürün Ekle</a>
                    <a class="btn btn-success  m-3" href="{{route('admin.products.file-export') }}"><i class="fa fa-file-excel"></i> Toplu Ürün İndir</a>
                    <button type="button" class="btn btn-dark  m-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file-excel"></i>
                        Toplu Ürün Yükle
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Toplu Ürün Yükleme</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.products.file-import') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Excel Yükle</label>
                                            <input type="file" name="file" id="file"  class="form-control-file btn btn-success">
                                            <br>
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                        <input type="submit" name="submit" value="Yükle" class="btn btn-danger" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @can("products-all-delete")
                        <a href="{{route("admin.products.deleteproductsAll")}}" class="btn btn-danger  m-3"> <i class="fa fa-trash"></i> Tüm Verileri Sil</a>
                    @endcan
                </div>
            </div>
            <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form action="{{route("admin.products.searchproducts")}}" class="card card-sm">
                                <div class="card-title" style="float:right">
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" name="q" placeholder="Ürün Adı veya Stok Kodu Ara...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-lg table-responsive">
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
                                <td>
                                    <a href="{{route("admin.products.edit",$productRow)}}">
                                        <img src="{{asset("app/admin/uploads/urunler/".$productRow->image)}}" width="100" alt="{{$productRow->product_name}}">
                                    </a>
                                </td>
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
                                    @can("deleteproducts")
                                        <button
                                                data-url="{{route("admin.products.deleteproducts",$productRow)}}"
                                                class="btn btn-danger silButton">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endcan
                                    <a href="{{route("admin.products.edit",$productRow)}}"
                                       class="btn btn-primary">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination justify-content-end">
                        {{$products->onEachSide(0)->links()}}
                    </ul>
                </div>
            </div>
        </div>
        </div>
    @endif
</div>
@endsection
