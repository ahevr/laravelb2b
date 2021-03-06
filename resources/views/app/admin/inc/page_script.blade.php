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
<script src="{{asset("app/admin")}}/vendors/summernote/summernote-lite.min.js"></script>
<script src="{{asset("app/admin")}}/js/switchery.js"></script>
<script src="https://unpkg.com/imask"></script>


<script>
    $(".button_usage_btn").change(function () {
        $(".button-inf-container").slideToggle();
    })
</script>


<script>
    $(".button_usage_isk").change(function () {
        $(".button-isk-container").slideToggle();
    })
</script>









<script>
    var phoneMask = IMask(
        document.getElementById('phone-mask'), {
            mask: '+{90}(000)000-00-00'
        });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<script>
    var elem = document.querySelector('.js-switch');
    var init = new Switchery(elem);
</script>

<script>
        $('.js-switch').change(function() {
            var isNew = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/admin/products/isnew',
                data: {'isNew': isNew, 'product_id': id},
                success: function(data){
                    console.log(data.success)
                }
            });
        })
</script>

<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 120,
        })
        $("#hint").summernote({
            height: 100,
            toolbar: false,
            placeholder: 'type with apple, orange, watermelon and lemon',
            hint: {
                words: ['apple', 'orange', 'watermelon', 'lemon'],
                match: /\b(\w{1,})$/,
                search: function (keyword, callback) {
                    callback($.grep(this.words, function (item) {
                        return item.indexOf(keyword) === 0;
                    }));
                }
            }
        });

    </script>


<script>
    $(".silButton").click(function () {
        var $data_url= $(this).data("url");
        Swal.fire({
            title: 'Emin Misiniz?',
            text: "Bu i??lem geri al??nmaz!",
            icon: 'warning',
            showCancelButton: true,
            titleColor : '#3085d6' ,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, sil!',
            cancelButtonText: 'Hay??r'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = $data_url;
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $(document).on("keyup", ".hesaplama", calcAll); //
        $(".hesaplama").on("change", calcAll); });
    function calcAll() {
        $(".satir").each(function () {
            var fiyat = 0;
            var iskonto = 0;
            var kdvli = 0;

            if (!isNaN(parseFloat($(this).find(".fiyat").val()))) {
                fiyat = parseFloat($(this).find(".fiyat").val());
            }
            if (!isNaN(parseFloat($(this).find(".iskonto").val()))) {
                iskonto = parseFloat($(this).find(".iskonto").val());
            }
            if (!isNaN(parseFloat($(this).find(".kdvli").val()))) {
                kdvli = parseFloat($(this).find(".kdvli").val());
            }
            iskontotutar = fiyat * iskonto/100;
            $(this).find(".iskontotutar").val(iskontotutar.toFixed(2));

            kdvlitutar  = fiyat - iskontotutar

            satisfiyat = kdvlitutar * kdvli ;
            $(this).find(".satisfiyati").val(satisfiyat.toFixed(2));

            satisfiyati = satisfiyat/100 + kdvlitutar  ;
            $(this).find(".satisfiyati").val(satisfiyati.toFixed(2));
        });
    }
</script>
