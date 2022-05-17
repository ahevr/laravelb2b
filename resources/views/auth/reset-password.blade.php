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
                        <h3 class="text-center">Şifremi Değiştir</h3>
                        <p class="text-center">Ege Sedef Aydınlatma B2b Bayi Online Alısveris Sistemi</p>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ol>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            @endif
                        <form class="login100-form" method="POST" action="{{route("site.resetpw")}}">
							@csrf
							<input type="hidden" name="token" value="{{$token}}">
                            <div class="col-md-12 text-center">
                                <small><b>Kisisel Bilgiler</b></small>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="bayi_email" value="{{$email ?? old("bayi_email")}}" placeholder="Email">
                                </div>
								<div class="col-md-12">
                                    <input type="text" class="form-control" name="password"  placeholder="Şifre">
                                </div>
								<div class="col-md-12">
                                    <input type="text" class="form-control" name="password_confirmation"  placeholder="Şifre Tekrar">
                                </div>
                            </div>
							<div class="form-button">
								<div class="d-flex justify-content-center">
									<button id="submit" type="submit" class="ibtn">Şifremi Değiştir</button>
								</div>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset("app/site/loginpage")}}/js/jquery.min.js"></script>
<script src="{{asset("app/site/loginpage")}}/js/popper.min.js"></script>
<script src="{{asset("app/site/loginpage")}}/js/bootstrap.min.js"></script>
<script src="{{asset("app/site/loginpage")}}/js/main.js"></script>
</body>
</html>
