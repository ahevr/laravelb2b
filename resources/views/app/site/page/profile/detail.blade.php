@extends("app.site.sitemasterpage")
@section("title","Sipariş Detayları")
@section("description", "Ege Sedef Avize Ürünler")
@section("keywords", "avize,sedefavize,aydınlatma,aplik,lambader,salonavizesi,masalambası,ithalürünler")
@section("content")
    @foreach($bio as $row)
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
        <div class="holder">
            <div class="container">
                <h2>Bayi Bilgileri</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bayi Adı</label>
                            <input type="text" class="form-control" value="{{$row->bayi_adi}}"  disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bayi Kodu</label>
                            <input type="text" class="form-control" value="{{$row->bayi_kodu}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bayi Temsilcisi</label>
                            <input type="text" class="form-control" value="{{$row->bayi_plasiyeri}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bayi Telefon</label>
                            <input type="text" class="form-control" value="{{$row->bayi_telefon}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bayi Email</label>
                            <input type="text" class="form-control" value="{{$row->bayi_email}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bayi İl</label>
                            <input type="text" class="form-control" value="{{$row->bayi_il}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bayi İlçe</label>
                            <input type="text" class="form-control" value="{{$row->bayi_ilce}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bayi Mahalle</label>
                            <input type="text" class="form-control" value="{{$row->bayi_mahalle}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bayi Açık Adres</label>
                            <input type="text" class="form-control" value="{{$row->bayi_adres}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bayi İskontosu-1 </label>
                            <input type="text" class="form-control" value="{{$row->bayi_isk1}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bayi İskontosu-2</label>
                            <input type="text" class="form-control" value="{{$row->bayi_isk2}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bayi KDV</label>
                            <input type="text" class="form-control" value="18" disabled>
                        </div>
                    </div>
                </div>
                <hr>
                    <h2>Parola Değiştir</h2>
                <form method="POST" action="{{ route("site.hesabim.resetpw") }}">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Parola</label>
                            <input type="text" name="password" class="form-control" placeholder="Şifre">
                            <input type="text" class="form-control" name="password_confirmation"  placeholder="Şifre Tekrar">
                        </div>
                        <div class="form-button">
                            <div class="d-flex justify-content-center">
                                <button id="submit" type="submit" class="btn btn-primary">Parola Değiştir</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection



