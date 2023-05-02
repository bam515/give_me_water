<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $admin_id
 * @property string $login_id
 * @property string $password
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereLoginId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Notice extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Plant extends \Eloquent {}
}

namespace App\Models{
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
 */
	class PlantComment extends \Eloquent {}
}

namespace App\Models{
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
 */
	class PlantImage extends \Eloquent {}
}

namespace App\Models{
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
 */
	class PlantLike extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $user_id
 * @property string $login_id
 * @property string $password
 * @property string $nick_name
 * @property string|null $user_birth
 * @property string|null $user_gender
 * @property string|null $kakao_id
 * @property string|null $google_id
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKakaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoginId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNickName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 */
	class User extends \Eloquent {}
}

