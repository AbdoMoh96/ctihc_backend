<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $group
 * @property string $key
 * @property string $value
 * @property int $created_by
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Data newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Data newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Data query()
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereValue($value)
 * @mixin \Eloquent
 */
class Data extends Model
{
    use HasFactory;

    protected $table = "data";
    protected $fillable = ['group', 'key', 'value'];
}
