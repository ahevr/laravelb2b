<!DOCTYPE html>
<html lang="tr">
<head>
@include("app.admin.inc.head")
</head>
<body>
<div id="app">
    @include("app.admin.inc.sidebar")
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            @yield("pageHeading")
        </div>
        <div class="page-content">
            <section class="row">
                @yield("content")
            </section>
        </div>
        @include("app.admin.inc.footer")
    </div>
</div>
@include('sweetalert::alert')
@include("app.admin.inc.page_script")
</body>
</html>