<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            // Create the partner
            $partnerId = DB::table('partners')->insertGetId([
                'slug' => Str::slug('partner-' . $i),
                'image' => 'images/partner_' . $i . '.jpg',
                'created_by' => rand(1, 5), // assuming user IDs between 1 and 5
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Create the 'en' (English) language version
            DB::table('partners_lang')->insert([
                'partner_id' => $partnerId,
                'lang' => 'en',
                'title' => 'Partner ' . $i . ' Title (EN)',
                'description' => 'This is the English description for Partner ' . $i,
                'btn_text' => 'Learn More',
                'created_by' => rand(1, 5), // assuming user IDs between 1 and 5
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Create the 'ar' (Arabic) language version
            DB::table('partners_lang')->insert([
                'partner_id' => $partnerId,
                'lang' => 'ar',
                'title' => 'عنوان الشريك ' . $i . ' (AR)',
                'description' => 'هذا هو الوصف باللغة العربية للشريك ' . $i,
                'btn_text' => 'اعرف أكثر',
                'created_by' => rand(1, 5), // assuming user IDs between 1 and 5
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
