<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;
use App\Models\Lang\SliderLang;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $homeSlider = new Slider();
        $homeSlider->slug = "home-slider";
        $homeSlider->is_parent = true;
        $homeSlider->save();


        Slider::create([]);
    }
}
