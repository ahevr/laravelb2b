<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>{{date("Y")}} &copy; Ege Sedef Aydınlatma | B2B </p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                        href="https://www.aheworks.com/">Ahmet Hüsrev Erşen</a></p>
            <form action="{{route("admin.logout")}}" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-primary">Çıkış Yap</button>
            </form>
        </div>

    </div>
</footer>
