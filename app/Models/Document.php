<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Lang\DocumentLang;

/**
 *
 *
 * @property int $id
 * @property string|null $document_path
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, DocumentLang> $document_ar
 * @property-read int|null $document_ar_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, DocumentLang> $document_en
 * @property-read int|null $document_en_count
 * @mixin \Eloquent
 */
class Document extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "documents";

    public function document_lang(){
        return $this->hasMany(DocumentLang::class,"document_id", "id");
    }

    public function document_en(){
        return $this->hasMany(DocumentLang::class,"document_id", "id")->where('lang', 'en');
    }

    public function document_ar(){
        return $this->hasMany(DocumentLang::class,"document_id", "id")->where('lang', 'ar');
    }

    public function createdBy() {
        return $this->belongsTo(Admin::class,'created_by', 'id');
    }
}
