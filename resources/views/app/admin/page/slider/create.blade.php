@extends("app.admin.masterpage")
@section("title","Bayi Oluştur | B2B Ege Sedef Aydınlatma")
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
                        <li class="breadcrumb-item"><a href="{{route("admin.bayi.index")}}">Bayi</a></li>
                        <li class="breadcrumb-item disabled">Bayi Ekle</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")

    <section class="section">
        <div class="row">
            <form action="{{route("admin.slider.store")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Slider Bilgileri</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Slider Adı</label>
                                    <input type="text" class="form-control" name="title" placeholder="Slider Adı Giriniz"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Slider Açıklaması</label>
                                    <input type="text" class="form-control" name="desc" placeholder="Slider Adı Giriniz"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-upload">
                                    <img src="{{asset("app/admin")}}/imgs/upload.svg" width="100px"/>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="switch switch-icon">
                                        <label> Buton Kullanımı
                                            <input type="checkbox" name="buton" class="button_usage_btn">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>

                            <div class="button-inf-container">
                                <div class="form-group">
                                    <label for="productName">Buton Başlık</label>
                                    <input type="text" class="form-control" name="buton_name" placeholder="Buttonun Adı">
                                </div>

                                <div class="form-group">
                                    <label for="productName">Buton URL</label>
                                    <input type="text" class="form-control" name="buton_url" placeholder="URL bilgisi">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-5">
                        <button id="submit" type="submit" class="btn btn-primary">Kayıt Ol</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
