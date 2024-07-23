<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;
use App\Models\Lang\SliderLang;
use App\Models\Admin;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::find(1);

        $homeSlider = new Slider();
        $homeSlider->slug = "home-slider";
        $homeSlider->created_by = $admin->id;
        $homeSlider->is_parent = true;
        $homeSlider->save();


        $homeSlide1 = new Slider();
        $homeSlide1->image = 'slide_1.png';
        $homeSlide1->parent_id = $homeSlider->id;
        $homeSlide1->created_by = $admin->id;
        $homeSlide1->save();

        $homeSlide2 = new Slider();
        $homeSlide2->image = 'slide_2.png';
        $homeSlide2->parent_id = $homeSlider->id;
        $homeSlide2->created_by = $admin->id;
        $homeSlide2->save();

        $homeSlide3 = new Slider();
        $homeSlide3->image = 'slide_3.png';
        $homeSlide3->parent_id = $homeSlider->id;
        $homeSlide3->created_by = $admin->id;
        $homeSlide3->save();

        $homeSlide4 = new Slider();
        $homeSlide4->image = 'slide_4.png';
        $homeSlide4->parent_id = $homeSlider->id;
        $homeSlide4->created_by = $admin->id;
        $homeSlide4->save();

        SliderLang::create([
            'slider_id' => $homeSlide1->id,
            'lang' => 'en',
            'title' => '',
            'description' => '',
            'created_by' => $admin->id,
        ]);

        SliderLang::create([
            'slider_id' => $homeSlide1->id,
            'lang' => 'ar',
            'title' => '',
            'description' => '',
            'created_by' => $admin->id,
        ]);


        SliderLang::create([
            'slider_id' => $homeSlide2->id,
            'lang' => 'en',
            'title' => '',
            'description' => '',
            'created_by' => $admin->id,
        ]);

        SliderLang::create([
            'slider_id' => $homeSlide2->id,
            'lang' => 'ar',
            'title' => '',
            'description' => '',
            'created_by' => $admin->id,
        ]);


        SliderLang::create([
            'slider_id' => $homeSlide3->id,
            'lang' => 'en',
            'title' => '',
            'description' => '',
            'created_by' => $admin->id,
        ]);

        SliderLang::create([
            'slider_id' => $homeSlide3->id,
            'lang' => 'ar',
            'title' => '',
            'description' => '',
            'created_by' => $admin->id,
        ]);

        SliderLang::create([
            'slider_id' => $homeSlide4->id,
            'lang' => 'en',
            'title' => '',
            'description' => '',
            'created_by' => $admin->id,
        ]);

        SliderLang::create([
            'slider_id' => $homeSlide4->id,
            'lang' => 'ar',
            'title' => '',
            'description' => '',
            'created_by' => $admin->id,
        ]);

    }
}
