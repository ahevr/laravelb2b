<?php

namespace App\Imports;

use App\Models\Admin\ProductModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class ProductUpdate implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows){
        foreach ($rows as $row) {
            ProductModel::updateOrCreate(
                [
                    "product_code" => $row["Ürün Kodu"],
                ],
                [
                    "stock_quantity" => $row["Stok Adeti"],
                    "total_price" => $row["Toplam Fiyat"],
                    "isActive" => $row["Aktif Mi"],
                    "isFyt" => $row["Fiyatlı Mı"],
                ]
            );
        }
    }
}
