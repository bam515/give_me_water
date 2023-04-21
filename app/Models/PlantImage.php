<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PlantImage
 *
 * @property int $image_id
 * @property int $plant_id
 * @property string $file_path
 * @property string $file_name
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlantImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantImage whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantImage whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantImage whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantImage wherePlantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PlantImage extends Model
{
    use HasFactory;

    protected $table = 'plant_images';
    protected $primaryKey = 'image_id';
    public $timestamps = false;
    protected $fillable = ['plant_id', 'file_path', 'file_name', 'created_at', 'updated_at'];
}
