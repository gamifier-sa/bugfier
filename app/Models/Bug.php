<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo};

class Bug extends Model
{
    protected $fillable = [
        'id', 'title', 'description', 'point','user_id' ,'project_id'
    ];
    public       $timestamps         = true;
    public array $searchRelationShip = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [];
    /**
     * [columns that needs to have customer search such as like or where in]
     *
     * @var string[]
     */
    public array $searchConfig = [
        'description' => 'like',
        'title' => 'like',

    ];

    protected $appends = ['create_since'];

    /**
     * @return null
     */
    public function getCreateSinceAttribute()
    {
        return $this->created_at?->diffForHumans();
    }

    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

}
