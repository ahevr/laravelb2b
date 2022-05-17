<?php

namespace App\Exports;

use App\Models\Admin\ProductModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){

        return ProductModel::get([
            "product_url","product_name","product_code","image","product_desc","stock_status","stock_quantity","price","discount","tax","total_price","usage_area","kol_sayisi",
            "material","width","height","length","kg","warranty_period","catalog_year","isActive","isNew","isFyt","created_by","update_by","brand","color","bulb","category_id","duy"
        ]);
    }

    public function headings() :array{

        return [
            "Ürün Url","Ürün Adı","Ürün Stok Kodu","Görsel","Ürün Açıklaması","Stok Durumu","Stok Adeti","Fiyat","İndirim","Kdv","Toplam Fiyat","Kullanım Alanı","Kol Sayısı",
            "Malzeme","En","Boy","Yükseklik","KG","Garanti Süresi","Katalog Yılı","Aktif Mi ?","Yeni Mi ?","Fiyatlı Mı ?","Oluşturan","Güncelleyen","Marka","Renk","Ampül","Kategori ID","Duy Tipi"
        ];

    }
}
