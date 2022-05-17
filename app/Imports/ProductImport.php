<?php

namespace App\Imports;

use App\Models\Admin\ProductModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class ProductImport implements ToModel,WithHeadingRow
{

    public function model(array $row)
    {

        return new ProductModel([
            "product_url"    => $row["URL"],
            "product_name"   => $row["Ürün Adı"],
            "product_code"   => $row["Ürün Kodu"],
            "image"          => $row["Görsel"],
            "product_desc"   => $row["Ürün Açıklaması"],
            "stock_status"   => $row["Stok Durumu"],
            "stock_quantity" => $row["Stok Adeti"],
            "price"          => $row["Fiyat"],
            "discount"       => $row["İndirim"],
            "tax"            => $row["KDV"],
            "total_price"    => $row["Toplam Fiyat"],
            "usage_area"     => $row["Kullanım Alanı"],
            "kol_sayisi"     => $row["Kol Sayısı"],
            "material"       => $row["Malzeme"],
            "width"          => $row["En"],
            "height"         => $row["Boy"],
            "length"         => $row["Yükseklik"],
            "kg"             => $row["KG"],
            "warranty_period"=> $row["Garanti Süresi"],
            "catalog_year"   => $row["Katalog Yılı"],
            "isActive"       => $row["Aktif Mi"],
            "isNew"          => $row["Yeni Mi"],
            "isFyt"          => $row["Fiyatlı Mı"],
            "created_by"     => $row["Oluşturan"],
            "update_by"      => $row["Güncelleyen"],
            "brand"          => $row["Marka"],
            "color"          => $row["Renk"],
            "bulb"           => $row["Ampül"],
            "category_id"    => $row["Kategori ID"],
            "duy"            => $row["Duy"],
        ]);

    }

}
