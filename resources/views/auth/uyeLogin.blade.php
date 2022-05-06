<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Ege Sedef Aydınlatma B2B</title>
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
                        <h3 class="text-center">Bayi Giriş</h3>
                        <p class="text-center">Ege Sedef Aydınlatma B2b Bayi Online Alısveris Sistemi</p>
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        <form method="POST" action="{{route('site.uye_check')}}">
                            @csrf
                            <div class="col-md-12 text-center">
                                <small><b>Kisisel Bilgiler</b></small>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control" type="email"  name="email"  value="{{ old('email') }}"placeholder="Eposta Adresi" required>
                                        @error('email')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="password"  name="password" placeholder="Şifre" required>
                                        @error('password')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                        
                                <div class="form-button">
                                    <div class="d-flex justify-content-center">
                                        <button id="submit" type="submit" class="ibtn">Giriş Yap</button>
                                    </div>
                                </div>
                        </form>
                        <div class="page-links">
                            <a href="{{route('site.forgetpasswordForm')}}">Şifremi Unuttum</a>
                        </div>
                        <div class="other-links">
                            <div class="text">Or register with</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                        </div>
                        <div class="page-links">
                            <a href="{{route("site.uye_register")}}">Kayıt Ol</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
<script>select({ilListesi:"ilselect",ilceListesi:"ilceselect",mahalleListesi:"mahalleselect"});</script>
<script src="{{asset("app/site/loginpage")}}/js/jquery.min.js"></script>
<script src="{{asset("app/site/loginpage")}}/js/popper.min.js"></script>
<script src="{{asset("app/site/loginpage")}}/js/bootstrap.min.js"></script>
<script src="{{asset("app/site/loginpage")}}/js/main.js"></script>
</body>
</html>