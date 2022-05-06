<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Ege Sedef Aydınlatma B2B Kayıt Ol</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset("app/site/loginpage")}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset("app/site/loginpage")}}/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset("app/site/loginpage")}}/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="{{asset("app/site/loginpage")}}/css/iofrm-theme19.css">

<script type="text/javascript" src="https://apicrow.com/adres/select.js" language="javascript"></script>
</head>
<body>
	<div class="form-body without-side">
        
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="{{asset("app/site/loginpage")}}/images/graphic3.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3 class="text-center">Yeni Bayi Kayıt</h3>
                        <p class="text-center">Ege Sedef Aydınlatma B2b Bayi Online Alısveris Sistemi</p>

                        {{-- @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ol>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        @endif --}}


                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif



                        <form method="POST" action="{{route("site.uye_register")}}">
                            @csrf
                            <div class="col-md-12 text-center">
                                <small><b>Kisisel Bilgiler</b></small>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control" type="text"  name="name"  value="{{ old('name') }}"placeholder="Adınız" required>
                                        @error('name')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text"  name="surname" value="{{ old('surname') }}"placeholder="Soyadınız" required>
                                        @error('surname')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}"placeholder="E-mail Address" required>
                                        @error('email')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" type="phone" name="phone" value="{{ old('phone') }}" placeholder="Telefon" maxlength="11" required>
                                        @error('phone')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <small><b>Adres Bilgileri</b></small>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="custom-select mb-3" name="il" id="ilselect"></select>
                                    @error('il')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <select class="custom-select mb-3" name="ilce" id="ilceselect"></select>
                                    @error('ilce')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <select class="custom-select mb-3" name="mahalle" id="mahalleselect"></select>
                                    @error('mahalle')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="adres" rows="3" placeholder="Adres">{{ old('adres') }}</textarea>
                                    @error('adres')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <small><b>Şifre Bilgileri</b></small>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" type="password" name="password" placeholder="Şifre" required>
                                    @error('password')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Şifre Tekrar" required>
                                    @error('password_confirmation')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                                <div class="form-button">
                                    <div class="d-flex justify-content-center">
                                        <button id="submit" type="submit" class="ibtn">Kayıt Ol</button>
                                    </div>
                                </div>
                        </form>
                        <div class="other-links">
                            <div class="text">Or register with</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                        </div>
                        <div class="page-links">
                            <a href="{{route("site.uye_login")}}">Giriş Yap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>select({ilListesi:"ilselect",ilceListesi:"ilceselect",mahalleListesi:"mahalleselect"});</script>
<script src="{{asset("app/site/loginpage")}}/js/jquery.min.js"></script>
<script src="{{asset("app/site/loginpage")}}/js/popper.min.js"></script>
<script src="{{asset("app/site/loginpage")}}/js/bootstrap.min.js"></script>
<script src="{{asset("app/site/loginpage")}}/js/main.js"></script>
</body>
</html>