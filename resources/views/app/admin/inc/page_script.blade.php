<script src="{{asset("app/admin")}}/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{asset("app/admin")}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset("app/admin")}}/js/pages/dashboard.js"></script>
<script src="{{asset("app/admin")}}/js/main.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



<script>
    $(".silButton").click(function () {
        var $data_url= $(this).data("url");
        Swal.fire({
            title: 'Emin Misiniz?',
            text: "Bu işlem geri alınmaz!",
            icon: 'warning',
            showCancelButton: true,
            titleColor : '#3085d6' ,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, sil!',
            cancelButtonText: 'Hayır'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = $data_url;
            }
        });
    });
</script>