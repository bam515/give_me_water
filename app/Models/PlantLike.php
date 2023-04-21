<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PlantLike
 *
 * @property int $like_id
 * @property int $plant_id
 * @property int $user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLike whereLikeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLike wherePlantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLike whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLike whereUserId($value)
 * @mixin \Eloquent
 */
class PlantLike extends Model
{
    use HasFactory;

    protected $table = 'plant_likes';
    protected $primaryKey = 'like_id';
    public $timestamps = false;
    protected $fillable = ['plant_id', 'user_id', 'created_at', 'updated_at'];
}
