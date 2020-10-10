<?php

namespace App\Models\Music;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Music\Singer
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Singer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Singer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Singer query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $position
 * @property string|null $description
 * @property string|null $cover
 * @property int $group_id
 * @property int $created_user_id
 * @property string $slug
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Music\Group $group
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Singer findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Singer whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Singer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Singer whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Singer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Singer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Singer whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Singer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Singer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Singer wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Singer whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Singer whereUpdatedAt($value)
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
