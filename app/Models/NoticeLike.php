<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeLike extends Model
{
    use HasFactory;

    protected $table = 'notice_likes';
    protected $primaryKey = 'like_id';
    public $timestamps = false;
    protected $fillable = ['notice_id', 'user_id', 'created_at'];
}
