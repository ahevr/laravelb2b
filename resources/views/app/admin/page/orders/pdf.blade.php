<!doctype html>
<html lang="tr">
<head>
{{--    <meta charset="UTF-8">--}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ substr($orders->bayi->bayi_adi,0,30) }} Ait Sipariş Detayları</title>
</head>
<body>
<style>
    body{
        font-family: 'DejaVu Sans', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;
    }
    .w-85{
        width:85%;
    }
    .w-15{
        width:15%;
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<div class="head-title">
    <h2 class="text-center m-0 p-0">{{substr($orders->bayi->bayi_adi,0,30)}}.. Siparis Bilgileri</h2>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Siparis ID - <span class="gray-color">#SDF-{{$orders->order_no}}-{{date("Y")}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Siparis Tarihi - <span class="gray-color">{{$orders->created_at}}</span></p>
    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Gönderici</th>
            <th class="w-50">Alıcı</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>Ege Sedef Aydınlatma</p>
                    <p></p>
                    <p>İzmir Gaziemir,</p>
                    <p>Dokuz Eylül Mh 695 SK no 13,</p>
                    <p>Türkiye</p>
                    <p>İletişim : 0555 573 25 27</p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>{{substr($orders->bayi->bayi_adi,0,30)}}</p>
                    <p></p>
                    <p>{{$orders->bayi->bayi_il}},</p>
                    <p>{{$orders->bayi->bayi_ilce}}</p>
                    <p>{{$orders->adres}}</p>
                    <p>iletişim : {{$orders->telefon}}</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Ödeme Yöntemi</th>
            <th class="w-50">Kargo Yöntemi</th>
        </tr>
        <tr>
            <td>Havale/EFT/Online Ödeme</td>
            <td>2.000 TL ve Üzeri Siparişleriniz MNG KARGO ile ücretsiz bir şekilde gönderilmektedir.</td>
        </tr>
    </table>
</div>

<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>

            <th class="w-50">Ürün Adı</th>
            <th class="w-50">Adet</th>
            <th class="w-50">Liste Fiyatı</th>
            <th class="w-50">Sipariş Tarihi</th>
        </tr>

        @foreach($sip as $row)
            <tr class="text-center">
                <td><b class="text-success">{{$row->product->product_name}}</b></td>
                <td>{{$row->adet}}</td>
                <td><b class="text-danger">{{number_format($row->fiyat,2,',','.')}} TL</b></td>
                <td>{{$row->created_at}}</td>
            </tr>
        @endforeach


        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Toplam</p>
                        <p>KDV (18%)</p>
                        <p>İSK</p>
                        <p>Genel Toplam</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        @php($toplam = 0)
                        @foreach($sip as $row)
                            @php($toplam += $row->fiyat)
                        @endforeach
                        {{number_format($toplam,2,',','.')}} TL
                        <p>18%</p>
                        <p>{{$row->bayi_isk1 ."+".$row->bayi_isk2}}</p>
                        <p>{{ number_format($row->order->total_price,2,',','.') }}</p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
    </table>
</div>

</body>
</html>

