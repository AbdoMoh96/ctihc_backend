<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(DataSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(AlbumSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(DocumentSeeder::class);
    }
}
