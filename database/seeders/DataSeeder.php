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

        Data::create([
            "group" => "contact_us",
            "key" => "location_short_url",
            "value" => "https://maps.app.goo.gl/X7jD9bYWyrYdhTxX6",
        ]);

        Data::create([
            "group" => "contact_us",
            "key" => "email",
            "value" => "contact@ctihc.com",
        ]);

        Data::create([
            "group" => "contact_us",
            "key" => "fax",
            "value" => "23903235-23955922(202)",
        ]);

        Data::create([
            "group" => "contact_us",
            "key" => "phone",
            "value" => "23905153-23953447(202)",
        ]);

        Data::create([
            "group" => "contact_us",
            "key" => "phone_action",
            "value" => "0223953447",
        ]);

        Data::create([
            "group" => "contact_us",
            "key" => "location",
            "value" => "https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3453.5977765336825!2d31.243192161877772!3d30.04839525266174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzDCsDAyJzUyLjkiTiAzMcKwMTQnNDYuNCJF!5e0!3m2!1sen!2seg!4v1716568396173!5m2!1sen!2seg",
        ]);

        Data::create([
            "group" => "contact_us",
            "key" => "address_en",
            "value" => "8 El-Sayed Mohammed Taher",
        ]);

        Data::create([
            "group" => "contact_us",
            "key" => "address_ar",
            "value" => "8 السيد محمد طاهر",
        ]);

        Data::create([
            "group" => "contact_us",
            "key" => "whats_app",
            "value" => "https://wa.me/+201121226689",
        ]);

        Data::create([
            "group" => "contact_us",
            "key" => "linkedIn",
            "value" => "https://www.linkedin.com/",
        ]);

        Data::create([
            "group" => "contact_us",
            "key" => "twitter",
            "value" => "https://x.com/",
        ]);

        Data::create([
            "group" => "contact_us",
            "key" => "facebook",
            "value" => "https://www.facebook.com/DeTexEgypt/",
        ]);



        Data::create([
            "group" => "about_us",
            "key" => "home_page_title_en",
            "value" => "The Cotton, Spinning, Weaving, and Ready-Made Garments Holding Company",
        ]);


        Data::create([
            "group" => "about_us",
            "key" => "home_page_title_ar",
            "value" => "شركة القطن والغزل والنسيج والملابس الجاهزة القابضة",
        ]);


        Data::create([
            "group" => "about_us",
            "key" => "home_page_description_en",
            "value" => "The Cotton, Spinning, Weaving, and Ready-Made Garments Holding Company, under the Ministry of Public Business Sector, was established by Law No. 203 of 1991. It aims to boost investment in Egypt's cotton, textile, and garment manufacturing and export sectors.",
        ]);


        Data::create([
            "group" => "about_us",
            "key" => "home_page_description_ar",
            "value" => "شركة القطن والغزل والنسيج والملابس الجاهزة القابضة، التابعة لوزارة قطاع الأعمال العام، تأسست بموجب القانون رقم 203 لسنة 1991. تهدف إلى تعزيز الاستثمار في قطاع القطن والمنسوجات وصناعة الملابس وتصديرها في مصر.",
        ]);

    }
}
