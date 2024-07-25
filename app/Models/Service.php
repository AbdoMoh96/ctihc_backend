<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lang\ServiceLang;

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
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @property-read \App\Models\Admin|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ServiceLang> $service_ar
 * @property-read int|null $service_ar_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ServiceLang> $service_en
 * @property-read int|null $service_en_count
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSlug($value)
 * @mixin \Eloquent
 */
class Service extends Model
{
    use HasFactory;

    protected $table = "services";


    public function service_en(){
        return $this->hasMany(ServiceLang::class,"service_id", "id")->where('lang', 'en');
    }

    public function service_ar(){
        return $this->hasMany(ServiceLang::class,"service_id", "id")->where('lang', 'ar');
    }

    public function createdBy() {
        return $this->belongsTo(Admin::class,'created_by', 'id');
    }
}
