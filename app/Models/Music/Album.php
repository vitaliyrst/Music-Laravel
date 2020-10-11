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
 * App\Models\Music\Album
 *
 * @method static Builder|Album newModelQuery()
 * @method static Builder|Album newQuery()
 * @method static Builder|Album query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $cover
 * @property string|null $release_date
 * @property string|null $label
 * @property int $group_id
 * @property int $created_user_id
 * @property string $slug
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Group $group
 * @property-read Collection|Song[] $song
 * @property-read int|null $song_count
 * @property-read User $user
 * @method static Builder|Album findSimilarSlugs($attribute, $config, $slug)
 * @method static Builder|Album whereCover($value)
 * @method static Builder|Album whereCreatedAt($value)
 * @method static Builder|Album whereCreatedUserId($value)
 * @method static Builder|Album whereDeletedAt($value)
 * @method static Builder|Album whereDescription($value)
 * @method static Builder|Album whereGroupId($value)
 * @method static Builder|Album whereId($value)
 * @method static Builder|Album whereLabel($value)
 * @method static Builder|Album whereReleaseDate($value)
 * @method static Builder|Album whereSlug($value)
 * @method static Builder|Album whereTitle($value)
 * @method static Builder|Album whereUpdatedAt($value)
 */

class Album extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'description',
        'cover',
        'release_date',
        'label',
        'group_id',
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
     * @return BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Music\Group', 'group_id');
    }

    /**
     * @return HasMany
     */
    public function song()
    {
        return $this->hasMany('App\Models\Music\Song', 'album_id');
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
