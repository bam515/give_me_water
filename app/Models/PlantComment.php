<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantComment extends Model
{
    use HasFactory;

    protected $table = 'plant_comments';
    protected $primaryKey = 'comment_id';
    public $timestamps = false;
    protected $fillable = ['plant_id', 'user_id', 'comment', 'created_at', 'updated_at'];
}
