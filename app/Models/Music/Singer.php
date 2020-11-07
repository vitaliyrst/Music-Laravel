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
 * App\Models\Music\Singer
 *
 * @property int $id
 * @property string $name
 * @property string|null $position
 * @property string|null $description
 * @property string|null $cover
 * @property int $group_id
 * @property int $created_user_id
 * @property string $slug
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\Music\Group $group
 * @property-read User $user
 * @method static Builder|Singer findSimilarSlugs($attribute, $config, $slug)
 * @method static Builder|Singer newModelQuery()
 * @method static Builder|Singer newQuery()
 * @method static Builder|Singer query()
 * @method static Builder|Singer whereCover($value)
 * @method static Builder|Singer whereCreatedAt($value)
 * @method static Builder|Singer whereCreatedUserId($value)
 * @method static Builder|Singer whereDeletedAt($value)
 * @method static Builder|Singer whereDescription($value)
 * @method static Builder|Singer whereGroupId($value)
 * @method static Builder|Singer whereId($value)
 * @method static Builder|Singer whereName($value)
 * @method static Builder|Singer wherePosition($value)
 * @method static Builder|Singer whereSlug($value)
 * @method static Builder|Singer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Singer extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'position',
        'description',
        'cover',
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

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
