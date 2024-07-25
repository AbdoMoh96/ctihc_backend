<?php

namespace App\Models;

use App\Models\Lang\AlbumLang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $image
 * @property int $is_parent
 * @property int|null $parent_id
 * @property int $created_by
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Album newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album query()
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereIsParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, AlbumLang> $album_ar
 * @property-read int|null $album_ar_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, AlbumLang> $album_en
 * @property-read int|null $album_en_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Album> $albums
 * @property-read int|null $albums_count
 * @property-read Album|null $parent
 * @mixin \Eloquent
 */
class Album extends Model
{
    use HasFactory;

    protected $table = "albums";


    public function albums(){
        return $this->hasMany(Album::class,"parent_id","id");
    }

    public function parent()
    {
        return $this->belongsTo(Album::class, 'parent_id', 'id');
    }

    public function album_en(){
        return $this->hasMany(AlbumLang::class,"album_id", "id")->where('lang', 'en');
    }

    public function album_ar(){
        return $this->hasMany(AlbumLang::class,"album_id", "id")->where('lang', 'ar');
    }
}
