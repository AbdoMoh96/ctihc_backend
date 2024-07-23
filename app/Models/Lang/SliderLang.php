<?php

namespace App\Models\Lang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SliderLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderLang query()
 * @property int $id
 * @property int $slider_id
 * @property string $lang
 * @property string|null $title
 * @property string|null $description
 * @property string|null $btn_text
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SliderLang whereBtnText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderLang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderLang whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderLang whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderLang whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderLang whereSliderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderLang whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderLang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SliderLang extends Model
{
    use HasFactory;

    protected $table = "sliders_lang";
}
