<script src="{{asset("app/site")}}/js/vendor-special/lazysizes.min.js"></script>
<script src="{{asset("app/site")}}/js/vendor-special/ls.bgset.min.js"></script>
<script src="{{asset("app/site")}}/js/vendor-special/ls.aspectratio.min.js"></script>
<script src="{{asset("app/site")}}/js/vendor-special/jquery.min.js"></script>
<script src="{{asset("app/site")}}/js/vendor-special/jquery.ez-plus.js"></script>
<script src="{{asset("app/site")}}/js/vendor-special/instafeed.min.js"></script>
<script src="{{asset("app/site")}}/js/vendor/vendor.min.js"></script>
<script src="{{asset("app/site")}}/js/app-html.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>



<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $('.updateCart').on('change', function () {
        var id = $(this).attr('data-id');
        var qty = $(this).val();
        $.ajax({
            type: 'PUT',
            url: '/card/sepetguncelle/' + id,
            dataType: 'json',
            data: {
                qty: qty,
                rowid: id
            },
            success: function () {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: false,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: 'Sepet Güncellendi'
                }).then(function()
                {
                    location.reload();
                });
            }
        });
    });
</script>



<script>
    $("#sort").on('change',function () {
        this.form.submit();
    })
</script>

<script>
    $('.dontAddToCart').click(function(){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: 'Ürün Fiyatı Güncellenmektedir !'
        })
    });
</script>

