Hoş geldiniz Sayın, <b>{{Auth::guard("bayi")->user()->bayi_adi}}</b>
<div class="d-flex justify-content-end mt-3">
    <form action="{{route("site.logout")}}" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-primary">Çıkış Yap</button>
    </form>
</div>
@include('sweetalert::alert')

