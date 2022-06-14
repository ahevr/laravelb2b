<!DOCTYPE html>
<html lang="tr">
<head>
    @include('app.site.includes.head')
</head>
<body class="template-collection has-smround-btns has-loader-bg equal-height has-sm-container">

    @include('app.site.includes.header')
<div class="page-content">
    @yield('content')
</div>
    @include('app.site.includes.footer')
<div class="footer-sticky">
    <!-- back to top -->
    <a class="back-to-top js-back-to-top compensate-for-scrollbar" href="#" title="Scroll To Top">
        <i class="icon icon-angle-up"></i>
    </a>
    <!-- loader -->
    <div class="loader-horizontal js-loader-horizontal">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
        </div>
    </div>
</div>
    @include('sweetalert::alert')
    @include('app.site.includes.page_script')
</body>
</html>
