<?php

namespace App\Models\Lang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumLang query()
 * @property int $id
 * @property int $album_id
 * @property string $lang
 * @property string|null $title
 * @property string|null $description
 * @property string|null $btn_text
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumLang whereAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumLang whereBtnText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumLang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumLang whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumLang whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumLang whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumLang whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumLang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AlbumLang extends Model
{
    use HasFactory;

    protected $table = "albums_lang";
}
