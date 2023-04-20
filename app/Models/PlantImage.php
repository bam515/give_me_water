<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantImage extends Model
{
    use HasFactory;

    protected $table = 'plant_images';
    protected $primaryKey = 'image_id';
    public $timestamps = false;
    protected $fillable = ['plant_id', 'file_path', 'file_name', 'created_at', 'updated_at'];
}
