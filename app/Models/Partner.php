<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lang\PartnerLang;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $image
 * @property int $created_by
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Partners newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partners newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partners query()
 * @method static \Illuminate\Database\Eloquent\Builder|Partners whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partners whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partners whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partners whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partners whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partners whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partners whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Partner extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'partners';

    public function partner_lang(){
        return $this->hasMany(PartnerLang::class,"partner_id", "id");
    }

    public function partner_en(){
        return $this->hasMany(PartnerLang::class,"partner_id", "id")->where('lang', 'en');
    }

    public function partner_ar(){
        return $this->hasMany(PartnerLang::class,"partner_id", "id")->where('lang', 'ar');
    }

    public function createdBy() {
        return $this->belongsTo(Admin::class,'created_by', 'id');
    }
}
