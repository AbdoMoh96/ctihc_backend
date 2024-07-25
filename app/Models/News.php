<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lang\NewsLang;

/**
 * 
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $slug
 * @property int $created_by
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @property-read \App\Models\Admin|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, NewsLang> $news_ar
 * @property-read int|null $news_ar_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, NewsLang> $news_en
 * @property-read int|null $news_en_count
 * @mixin \Eloquent
 */
class News extends Model
{
    use HasFactory;
    protected $table = "news";

    public function news_en(){
        return $this->hasMany(NewsLang::class,"news_id", "id")->where('lang', 'en');
    }

    public function news_ar(){
        return $this->hasMany(NewsLang::class,"news_id", "id")->where('lang', 'ar');
    }

    public function createdBy() {
        return $this->belongsTo(Admin::class,'created_by', 'id');
    }
}
