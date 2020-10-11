<?php

namespace App\Models\Music;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Music\Song
 *
 * @method static Builder|Song newModelQuery()
 * @method static Builder|Song newQuery()
 * @method static Builder|Song query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $duration
 * @property int|null $song_number
 * @property int $album_id
 * @property int $created_user_id
 * @property string $slug
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Album $album
 * @property-read User $user
 * @method static Builder|Song findSimilarSlugs($attribute, $config, $slug)
 * @method static Builder|Song whereAlbumId($value)
 * @method static Builder|Song whereCreatedAt($value)
 * @method static Builder|Song whereCreatedUserId($value)
 * @method static Builder|Song whereDeletedAt($value)
 * @method static Builder|Song whereDuration($value)
 * @method static Builder|Song whereId($value)
 * @method static Builder|Song whereSlug($value)
 * @method static Builder|Song whereSongNumber($value)
 * @method static Builder|Song whereTitle($value)
 * @method static Builder|Song whereUpdatedAt($value)
 */

class Song extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'duration',
        'description',
        'song_number',
        'album_id',
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
    public function album()
    {
        return $this->belongsTo('App\Models\Music\Album', 'album_id');
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
