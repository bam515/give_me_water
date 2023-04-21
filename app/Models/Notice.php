<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Notice
 *
 * @property int $notice_id
 * @property string $notice_title
 * @property string $notice_content
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Notice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereNoticeContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereNoticeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereNoticeTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Notice extends Model
{
    use HasFactory;

    protected $table = 'notices';
    protected $primaryKey = 'notice_id';
    public $timestamps = false;
    protected $fillable = ['notice_title', 'notice_content', 'created_at', 'updated_at'];
}
