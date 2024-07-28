<?php

namespace App\Models\Lang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLang query()
 * @property int $id
 * @property int $news_id
 * @property string $lang
 * @property string|null $title
 * @property string|null $description
 * @property string $body
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLang whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLang whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLang whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLang whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLang whereNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLang whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NewsLang extends Model
{
    use HasFactory;

    protected $table = "news_lang";

    protected $fillable = ['news_id', 'lang', 'title', 'description', 'body', 'created_by'];
}
