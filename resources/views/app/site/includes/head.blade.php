<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">
<meta name="author" content="aheworks.com">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title> @yield("title") </title>
@include('app.site.includes.page_style')
