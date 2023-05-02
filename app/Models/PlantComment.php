<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PlantComment
 *
 * @property int $comment_id
 * @property int $plant_id
 * @property int $user_id
 * @property string $comment
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlantComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantComment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantComment whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantComment wherePlantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantComment whereUserId($value)
 * @mixin \Eloquent
 */
class PlantComment extends Model
{
    use HasFactory;

    protected $table = 'plant_comments';
    protected $primaryKey = 'comment_id';
    public $timestamps = false;
    protected $fillable = ['plant_id', 'user_id', 'comment', 'created_at', 'updated_at'];
}
