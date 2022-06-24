@extends("app.admin.masterpage")
@section("title","Ürünler | B2B Ege Sedef Aydınlatma")
@section("pageHeading")
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h3>Cari Yönetim Paneli</h3>
                <p class="text-subtitle text-muted">Ege Sedef Aydınlatma b2b Yönetim Paneli</p>
            </div>
            <div class="col-12 col-md-12 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route("admin.bayi.index")}}">Bayiler</a></li>
                        <li class="breadcrumb-item"><a href="#">Cari</a></li>
                        <li class="breadcrumb-item disabled">{{$bayi->bayi_adi}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")
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

    <section class="section">
        <div class="row">
            <form action="{{route("admin.bayi.cariPost",$bayi)}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Cari Bilgileri</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">fis_no</label>
                                    <input type="text" class="form-control" name="fis_no"
                                           placeholder="Bayi Kodu"
                                           value="{{old("fis_no")}}"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">desc</label>
                                    <input type="text" class="form-control" name="desc"
                                           placeholder="Bayi Kodu"
                                           value="{{old("desc")}}"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">vade_tarihi</label>
                                    <input type="text" class="form-control" name="vade_tarihi"
                                           placeholder="vade_tarihi"
                                           value="{{old("vade_tarihi")}}"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">borc_tutari</label>
                                    <input type="text" class="form-control" name="borc_tutari"
                                           placeholder="borc_tutari"
                                           value="{{old("borc_tutari")}}"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">alacak_tutari</label>
                                    <input type="text" class="form-control" name="alacak_tutari"
                                           placeholder="alacak_tutari"
                                           value="{{old("alacak_tutari")}}"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">borc_bakiye</label>
                                    <input type="text" class="form-control" name="borc_bakiye"
                                           placeholder="borc_bakiye"
                                           value="{{old("borc_bakiye")}}"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">alacak_bakiye</label>
                                    <input type="text" class="form-control" name="alacak_bakiye"
                                           placeholder="alacak_bakiye"
                                           value="{{old("alacak_bakiye")}}"/>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mb-5">
                                <button id="submit" type="submit" class="btn btn-primary">Kaydet</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="card card-custom mt-3">
                <div class="card-header">
                    <div class="card-title">
               <span class="card-icon">
                <i class="flaticon2-delivery-package text-primary"></i>
            </span>
                        <h3 class="card-label"> <small><b class="text-danger">{{$bayi->bayi_adi}}</b> </small> Bayisinin Cari Detayları</h3>
                    </div>
                </div>
                <div class="card card-custom">
                    <!--begin::Form-->
                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <th>fis_no</th>
                            <th>Açıklama</th>
                            <th>vade_tarihi</th>
                            <th>borc_tutari</th>
                            <th>alacak_tutari</th>
                            <th>borc_bakiye</th>
                            <th>alacak_bakiye</th>
                            </thead>
                            <tbody>
                            @foreach($data as $key=>$value)
                                <tr>
                                    <td>{{$value->fis_no}}</td>
                                    <td>{{$value->desc}}</td>
                                    <td>{{$value->vade_tarihi}}</td>
                                    <td>{{$value->borc_tutari}}</td>
                                    <td>{{$value->alacak_tutari}}</td>
                                    <td>{{$value->borc_bakiye}}</td>
                                    <td>{{$value->alacak_bakiye}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                @php($toplam=0)
                                @foreach($data as $key=>$value)
                                    @php($toplam+= $value->borc_tutari)
                                @endforeach
                                <td colspan="3">Toplam</td>
                                <td>  {{number_format($toplam,2)}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </section>


@endsection
