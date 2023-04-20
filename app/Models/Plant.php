<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $table = 'plants';
    protected $primaryKey = 'plant_id';
    public $timestamps = false;
    protected $fillable = ['user_id', 'plant_name', 'water_cycle', 'created_at', 'updated_at'];
}
