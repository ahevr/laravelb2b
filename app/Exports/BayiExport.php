<?php

namespace App\Exports;

use App\Models\Bayi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BayiExport implements FromCollection,WithHeadings
{
    public function collection(){

        return Bayi::get([
            "bayi_adi",
            "bayi_kodu",
            "bayi_plasiyeri",
            "bayi_telefon",
            "bayi_email",
            "bayi_il",
            "bayi_ilce",
            "bayi_mahalle",
            "bayi_adres",
            "bayi_isk1",
            "bayi_isk2",
            "bayi_isk3",
            "bayi_kdv",
            "email_verified"
        ]);
    }

    public function headings() :array{

        return [
            "Bayi Adı",
            "Bayi Kodu",
            "Bayi Plasiyeri",
            "Bayi Telefon",
            "Bayi E-Postası",
            "Bayi İl",
            "Bayi İlçe",
            "Bayi Mahalle",
            "Bayi Adres",
            "Bayi_İsk1",
            "Bayi_İsk2",
            "Bayi_İsk3",
            "Bayi KDV",
            "Email Onayı"
        ];

    }
}
