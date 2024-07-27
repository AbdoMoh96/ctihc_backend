<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lang\SliderLang;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $image
 * @property string|null $link
 * @property int $is_parent
 * @property int|null $parent_id
 * @property int $created_by
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereIsParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 * @property-read Slider|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, SliderLang> $slide_ar
 * @property-read int|null $slide_ar_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, SliderLang> $slide_en
 * @property-read int|null $slide_en_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Slider> $slides
 * @property-read int|null $slides_count
 * @mixin \Eloquent
 */
class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "sliders";
    protected $fillable = ['slug', 'image', 'link', 'is_parent'];

    public function slides(){
        return $this->hasMany(Slider::class,"parent_id","id");
    }

    public function parent()
    {
        return $this->belongsTo(Slider::class, 'parent_id', 'id');
    }

    public function slide_lang(){
        return $this->hasMany(SliderLang::class,"slider_id", "id");
    }

    public function slide_en(){
        return $this->hasMany(SliderLang::class,"slider_id", "id")->where('lang', 'en');
    }

    public function slide_ar(){
        return $this->hasMany(SliderLang::class,"slider_id", "id")->where('lang', 'ar');
    }
}
