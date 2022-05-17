@extends("app.admin.masterpage")
@section("title","Ürünler | B2B Ege Sedef Aydınlatma")
@section("pageHeading")
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kullanıcı Yönetim Paneli</h3>
                <p class="text-subtitle text-muted">Ege Sedef Aydınlatma b2b Yönetim Paneli</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route("admin.bayi.index")}}">Bayi</a></li>
                        <li class="breadcrumb-item disabled">Bayi Düzenle</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")
    <section class="section">
        <div class="row">
            <form action="{{route("admin.bayi.update",$bayi)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Bayi Adı</label>
                                    <input type="text" class="form-control" name="bayi_adi"
                                           placeholder="Bayi Adı"
                                           value="{{$bayi->bayi_adi}}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Bayi Kodu</label>
                                    <input type="text" class="form-control" name="bayi_kodu"
                                           placeholder="Bayi Kodu"
                                           value="{{$bayi->bayi_kodu}}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Bayi Email</label>
                                    <input type="text" class="form-control" name="bayi_email"
                                           placeholder="Bayi Email"
                                           value="{{$bayi->bayi_email}}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Bayi Plasiyeri</label>
                                    <input type="text" class="form-control" name="bayi_plasiyeri"
                                           placeholder="Bayi Plasiyeri"
                                           value="{{$bayi->bayi_plasiyeri}}"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Bayi Telefon</label>
                                    <input type="text" class="form-control" name="bayi_telefon"
                                           placeholder="Bayi Telefon"
                                           value="{{$bayi->bayi_telefon}}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Bayi İl</label>
                                    <input type="text" class="form-control" name="bayi_il"
                                           placeholder="Bayi İl"
                                           value="{{$bayi->bayi_il}}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Bayi İlce</label>
                                    <input type="text" class="form-control" name="bayi_ilce"
                                           placeholder="Bayi İlce"
                                           value="{{$bayi->bayi_ilce }}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Bayi Mahalle</label>
                                    <input type="text" class="form-control" name="bayi_mahalle"
                                           placeholder="Bayi İlce"
                                           value="{{$bayi->bayi_mahalle }}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Bayi Adres</label>
                                    <input type="text" class="form-control" name="bayi_adres"
                                           placeholder="Bayi Adres"
                                           value="{{$bayi->bayi_adres}}"/>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Bayi İsk-1</label>
                                    <input type="text" class="form-control" name="bayi_isk1"
                                           placeholder="Bayi İsk-1"
                                           value="{{$bayi->bayi_isk1}}"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Bayi İsk-2</label>
                                    <input type="text" class="form-control" name="bayi_isk2"
                                           placeholder="Bayi İsk-2"
                                           value="{{$bayi->bayi_isk2}}"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Bayi İsk-3</label>
                                    <input type="text" class="form-control" name="bayi_isk3"
                                           placeholder="Bayi İsk-3"
                                           value="{{$bayi->bayi_isk3}}"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Bayi Kdv</label>
                                    <input type="text" class="form-control" name="bayi_kdv"
                                           placeholder="Bayi Kdv"
                                           value="{{$bayi->bayi_kdv}}"/>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-5">
                        <button id="submit" type="submit" class="btn btn-primary">Güncelle</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
