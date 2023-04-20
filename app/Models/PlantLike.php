<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantLike extends Model
{
    use HasFactory;

    protected $table = 'plant_likes';
    protected $primaryKey = 'like_id';
    public $timestamps = false;
    protected $fillable = ['plant_id', 'user_id', 'created_at', 'updated_at'];
}
