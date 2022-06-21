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
            <a class="btn btn-primary" href="{{route("admin.bayi.create")}}"><i class="fa-solid fa-plus"></i> Bayi Ekle</a>
            <a class="btn btn-success" href="{{route('admin.bayi.file-export') }}"><i class="fa fa-file-excel"></i> Toplu Ürün İndir</a>
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file-excel"></i>
                Toplu Bayi Yükle
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Toplu Bayi Yükleme</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.bayi.file-import') }}" method="post" enctype="multipart/form-data">
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
            <a href="{{route("admin.bayi.deleteproductsAll")}}" class="btn btn-danger"> <i class="fa fa-trash"></i> Tüm Verileri Sil</a>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Bayi Listesi</h4>
            </div>

            <form action="{{route("admin.bayi.isk1Update")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">isk güncelle</label>
                    <input type="text" name="bayi_isk1" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <form action="{{route("admin.bayi.isk2Update")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">isk2 güncelle</label>
                    <input type="text" name="bayi_isk2" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="card-content">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-primary m-3" href="{{route("admin.bayi.create")}}"><i class="fa-solid fa-plus"></i> Bayi Ekle</a>
                        <a class="btn btn-success  m-3" href="{{route('admin.bayi.file-export') }}"><i class="fa fa-file-excel"></i> Toplu Bayi İndir</a>
                        <button type="button" class="btn btn-dark  m-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file-excel"></i>
                            Toplu Bayi Yükle
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Toplu Bayi Yükleme</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.bayi.file-import') }}" method="post" enctype="multipart/form-data">
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
                            <a href="{{route("admin.bayi.deleteproductsAll")}}" class="btn btn-danger  m-3"> <i class="fa fa-trash"></i> Tüm Verileri Sil</a>
                        @endcan
                    </div>
                    <div class="table-responsive">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10 col-lg-8">
                                <form action="{{route("admin.bayi.searchbayi")}}" class="card card-sm">
                                    <div class="card-title" style="float:right">
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control" name="q" placeholder="Bayi Adı veya Bayi Kodu İle Ara...">
                                            <div class="form-control-icon">
                                                <i class="bi bi-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-lg">
                            <thead>
                            <tr>
                                <th>Bayi Adı</th>
                                <th>Bayi Kodu</th>
                                <th>Bayi İskontosu</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($bayi as $bayiRow)
                                    <tr>
                                        <td>{{$bayiRow->bayi_adi}}</td>
                                        <td>{{$bayiRow->bayi_kodu}}</td>
                                        <td><b>{{$bayiRow->bayi_isk1}} + {{$bayiRow->bayi_isk2}}</b></td>
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
                                            <a href="{{route("admin.bayi.cariForm",$bayiRow)}}"
                                               class="btn btn-primary">
                                                <i class="fa-solid fa-file-invoice"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <ul class="pagination justify-content-end">
                            {{$bayi->onEachSide(0)->links()}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
