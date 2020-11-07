<?php

namespace App\Models\Music;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Music\Group
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $cover
 * @property int $created_user_id
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|\App\Models\Music\Album[] $album
 * @property-read int|null $album_count
 * @property-read Collection|\App\Models\Music\Singer[] $singer
 * @property-read int|null $singer_count
 * @property-read User $user
 * @method static Builder|Group findSimilarSlugs($attribute, $config, $slug)
 * @method static Builder|Group newModelQuery()
 * @method static Builder|Group newQuery()
 * @method static Builder|Group query()
 * @method static Builder|Group whereCover($value)
 * @method static Builder|Group whereCreatedAt($value)
 * @method static Builder|Group whereCreatedUserId($value)
 * @method static Builder|Group whereDescription($value)
 * @method static Builder|Group whereId($value)
 * @method static Builder|Group whereSlug($value)
 * @method static Builder|Group whereTitle($value)
 * @method static Builder|Group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Group extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'description',
        'cover',
        'created_user_id',
        'slug',
    ];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id');
    }

    /**
     * @return HasMany
     */
    public function singer()
    {
        return $this->hasMany('App\Models\Music\Singer', 'group_id');
    }

    /**
     * @return HasMany
     */
    public function album()
    {
        return $this->hasMany('App\Models\Music\Album', 'group_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
