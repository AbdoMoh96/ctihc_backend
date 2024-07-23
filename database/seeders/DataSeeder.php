<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Data;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        Data::create([
            "group" => "",
            "key" => "",
            "value" => "",
        ]);
        */
        Data::create([
            "group" => "settings",
            "key" => "ctihc_logo",
            "value" => "ctihc_logo.png",
        ]);

        Data::create([
            "group" => "settings",
            "key" => "ctihc_second_logo",
            "value" => "ctihc_second_logo.png",
        ]);

        Data::create([
            "group" => "settings",
            "key" => "ctihc_logo_text_en",
            "value" => "Cotton & Textile Industries Holding",
        ]);


        Data::create([
            "group" => "settings",
            "key" => "ctihc_logo_text_ar",
            "value" => "الشركة القابضة للقطن والنسيج",
        ]);


        Data::create([
            "group" => "settings",
            "key" => "ctihc_second_logo_text_en",
            "value" => "Ministry Of Public Business Sector",
        ]);

        Data::create([
            "group" => "settings",
            "key" => "ctihc_second_logo_text_ar",
            "value" => "وزارة قطاع الأعمال العام",
        ]);

        Data::create([
            "group" => "settings",
            "key" => "copyright_title_en",
            "value" => "Privacy Policy and Disclaimer",
        ]);

        Data::create([
            "group" => "settings",
            "key" => "copyright_title_ar",
            "value" => "سياسة الخصوصية وإخلاء المسؤولية",
        ]);

        Data::create([
            "group" => "settings",
            "key" => "copyright_description_en",
            "value" => "© Holding Company for Cotton and Textiles (CTIHC) - 2024",
        ]);

        Data::create([
            "group" => "settings",
            "key" => "copyright_description_ar",
            "value" => "© الشركة القابضة للقطن والمنسوجات (CTIHC) - 2024",
        ]);

    }
}
