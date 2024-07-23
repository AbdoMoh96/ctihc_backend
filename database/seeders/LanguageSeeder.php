<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $english = new Language();
       $english->id = 'en';
       $english->name = 'English';
       $english->save();

       $arabic = new Language();
       $arabic->id = 'ar';
       $arabic->name = 'Arabic';
       $arabic->save();
    }
}
