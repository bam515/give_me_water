<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Plant
 *
 * @property int $plant_id
 * @property int $user_id
 * @property string $plant_name
 * @property string $water_cycle
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Plant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant wherePlantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant wherePlantName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereWaterCycle($value)
 * @mixin \Eloquent
 */
class Plant extends Model
{
    use HasFactory;

    protected $table = 'plants';
    protected $primaryKey = 'plant_id';
    public $timestamps = false;
    protected $fillable = ['user_id', 'plant_name', 'water_cycle', 'created_at', 'updated_at'];
}
