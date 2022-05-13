@extends("app.admin.masterpage")
@section("title","Ürün Ekle | B2B Ege Sedef Aydınlatma")
@section("pageHeading")
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ürün Ekle</h3>
                <p class="text-subtitle text-muted">Ege Sedef Aydınlatma b2b Yönetim Paneli</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route("admin.products.index")}}">Ürünler</a></li>
                        <li class="breadcrumb-item disabled">Ürün Ekle</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")
    @if (count($errors) > 0)
       <div class="alert alert-danger">
           <ol>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ol>
       </div>
   @endif
    <section class="content-main">
        <form action="{{route("admin.products.store")}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row satir">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Ürün Bilgileri</h4>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Ürün Adı</label>
                                            <input type="text" class="form-control" name="product_name"
                                                   placeholder="Ürün Adını Giriniz"
                                                   value="{{ old('product_name') }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Stok Kodu</label>
                                            <input type="text" class="form-control" name="product_code"
                                                   placeholder="Ürün Kodu Giriniz"
                                                   value="{{ old('product_code') }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="exampleInputPassword1">Stok Durumu<span class="text-danger">*</span></label>
                                            <select name="stock_status" class="form-control">
                                                <option value="">Seç..</option>
                                                <option value="Stokta">Stokta Var!</option>
                                                <option value="Üretimde">Üretimde</option>
                                                <option value="Stokta Yok">Stokta Yok!</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label>Stok Adeti <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="stock_quantity"
                                                   placeholder="Ürün Stok Adeti"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Ürün Açıklaması</label>
                                    <textarea id="summernote" name="product_desc"></textarea>
                                </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Ürün Özellikleri</h4>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">En</label>
                                            <input type="text" class="form-control" name="width" placeholder="Ürün En Giriniz"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Boy</label>
                                            <input type="text" class="form-control" name="height" placeholder="Ürün Boy Giriniz"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Yükseklik</label>
                                            <input type="text" class="form-control" name="length" placeholder="Ürün Yükseklik"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Ağırlık</label>
                                            <input type="text" class="form-control" name="kg" placeholder="Ürün KG"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label class="form-label">Renk</label>
                                            <input type="text" class="form-control" name="color" placeholder="Ürün Renk "/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label class="form-label">Ampül</label>
                                            <input type="text" class="form-control" name="bulb" placeholder="Ürün Ampül Sayısı"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label class="form-label">Malzeme</label>
                                            <input type="text" class="form-control" name="material" placeholder="Ürün Malzemesi"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label class="form-label">Duy</label>
                                            <input type="text" class="form-control" name="duy" placeholder="Ürün Duy Tipi"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Garanti Süresi</label>
                                            <input type="text" class="form-control" name="warranty_period" placeholder="Ürün Garanti Süresi"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Kullanım Alanı</label>
                                            <input type="text" class="form-control" name="usage_area" placeholder="Ürün Kullanım Alanı"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Kol Adeti</label>
                                            <input type="text" class="form-control" name="kol_sayisi" placeholder="Ürün Kol Adeti"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Katalog Yıl</label>
                                            <input type="text" class="form-control" name="catalog_year" placeholder="Ürünün Katalog Yılı"/>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Ürün Görseli</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-upload">
                                <img src="{{asset("app/admin")}}/imgs/upload.svg" width="100px"/>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Ürün Fiyat Bilgisi</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label">Fiyat</label>
                                        <div class="row gx-2">
                                            <input placeholder="₺" type="text" name="price" class="form-control fiyat hesaplama" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label">İndirim Oranı</label>
                                        <input placeholder="%" type="text" name="discount" class="form-control iskonto hesaplama" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label">KDV</label>
                                        <input placeholder="½" type="text" name="tax" class="form-control kdvli hesaplama" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label">Toplam Fiyat</label>
                                        <input placeholder="₺" type="text" name="total_price" class="form-control satisfiyati" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Ürün Yönetimi</h4>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Kategori</label>
                                    <select name="category_id" class="form-control">
                                        <option value="1">Kategori Seçiniz</option>
                                        @foreach($categories as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Marka</label>
                                    <input type="text" class="form-control" name="brand" placeholder="Marka"/>
                                </div>
                            </div>
                            <!-- row.// -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button id="submit" type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </form>
    </section>
@endsection
