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
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Notice
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Notice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notice query()
 */
	class Notice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Plant
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Plant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant query()
 */
	class Plant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PlantComment
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PlantComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantComment query()
 */
	class PlantComment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PlantImage
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PlantImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantImage query()
 */
	class PlantImage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PlantLike
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLike query()
 */
	class PlantLike extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

