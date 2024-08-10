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
 * @property int $document_id
 * @property string $lang
 * @property string|null $title
 * @property string|null $description
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
class DocumentLang extends Model
{
    use HasFactory;

    protected $table = "documents_lang";

    protected $fillable = ['document_id', 'lang', 'title', 'description', 'created_by'];
}
