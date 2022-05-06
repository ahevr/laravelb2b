<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Ege Sedef Aydınlatma B2B Kayıt Ol</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset("app/site/loginpage")}}/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("app/site/loginpage")}}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("app/site/loginpage")}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("app/site/loginpage")}}/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset("app/site/loginpage")}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("app/site/loginpage")}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("app/site/loginpage")}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset("app/site/loginpage")}}/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset("app/site/loginpage")}}/images/img-01.png" alt="IMG">
				</div>
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
					<span class="login100-form-title">
						Şifremi Değiştir
					</span>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="wrap-input100">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$email ?? old("email")}}" placeholder="Adınız">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="wrap-input100">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Şifre</label>
                                    <input type="text" class="form-control" name="password"  placeholder="password">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="wrap-input100">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Şifre Tekrar</label>
                                    <input type="text" class="form-control" name="password_confirmation"  placeholder="password_confirmation">
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Şifremi Değiştir
						</button>
					</div>
					<div class="text-center p-t-136">
						<a class="txt2" href="{{route("site.uye_login")}}">
							Üye Girişi
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<!--===============================================================================================-->	
	<script src="{{asset("app/site/loginpage")}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset("app/site/loginpage")}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset("app/site/loginpage")}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset("app/site/loginpage")}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset("app/site/loginpage")}}/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset("app/site/loginpage")}}/js/main.js"></script>

    

</body>
</html>