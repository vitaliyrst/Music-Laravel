<?php

namespace App\Models;

use App\Models\Music\Album;
use App\Models\Music\Group;
use App\Models\Music\Singer;
use App\Models\Music\Song;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string $slug
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Album[] $album
 * @property-read int|null $album_count
 * @property-read Collection|Group[] $group
 * @property-read int|null $group_count
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|Singer[] $singer
 * @property-read int|null $singer_count
 * @property-read Collection|Song[] $song
 * @property-read int|null $song_count
 * @method static Builder|User findSimilarSlugs($attribute, $config, $slug)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereSlug($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, Sluggable;

    /**
     * @return HasMany
     */
    public function group()
    {
        return $this->hasMany('App\Models\Music\Group', 'created_user_id');
    }

    /**
     * @return HasMany
     */
    public function album()
    {
        return $this->hasMany('App\Models\Music\Album', 'created_user_id');
    }

    /**
     * @return HasMany
     */
    public function singer()
    {
        return $this->hasMany('App\Models\Music\Singer', 'created_user_id');
    }

    /**
     * @return HasMany
     */
    public function song()
    {
        return $this->hasMany('App\Models\Music\Song', 'created_user_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
