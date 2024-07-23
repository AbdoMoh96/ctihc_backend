<?php

namespace App\Models\Lang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceLang query()
 * @property int $id
 * @property int $service_id
 * @property string $lang
 * @property string $title
 * @property int $created_by
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceLang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceLang whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceLang whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceLang whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceLang whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceLang whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceLang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ServiceLang extends Model
{
    use HasFactory;

    protected $table = "services_lang";
}
