<?php

namespace App\Imports;

use App\Models\Bayi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class BayiImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Bayi([
            "bayi_adi" => $row["Bayi Adı"],
            "bayi_kodu" => $row["Bayi Kodu"],
            "bayi_plasiyeri" => $row["Bayi Plasiyeri"],
            "bayi_telefon" => $row["Bayi Telefon"],
            "bayi_email" => $row["Bayi Email"],
            "password" => $row["Bayi Şifresi"],
            "bayi_il" => $row["Bayi İl"],
            "bayi_ilce" => $row["Bayi İlçe"],
            "bayi_mahalle" => $row["Bayi Mahalle"],
            "bayi_adres" => $row["Bayi Adres"],
            "bayi_isk1" => $row["Bayi İSK-1"],
            "bayi_isk2" => $row["Bayi İSK-2"],
            "bayi_isk3" => $row["Bayi İSK-3"],
            "bayi_kdv" => $row["Bayi KDV"],
            "email_verified" => $row["E Mail Onayı"]
        ]);
    }
}
