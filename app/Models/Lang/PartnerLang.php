<?php

namespace App\Models\Lang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PartnersLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnersLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnersLang query()
 * @property int $id
 * @property int $partner_id
 * @property string $lang
 * @property string|null $title
 * @property string|null $description
 * @property string|null $btn_text
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PartnersLang whereBtnText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnersLang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnersLang whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnersLang whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnersLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnersLang whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnersLang wherePartnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnersLang whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnersLang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PartnerLang extends Model
{
    use HasFactory;

    protected $table = 'partners_lang';

    protected $fillable = ['partner_id', 'lang', 'title', 'description', 'btn_text', 'created_by'];
}
