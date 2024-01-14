<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    protected $fillable = [
        'id', 'title','is_default'
    ];
    public $timestamps = true;
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
     * @return HasMany
     */
    public function bugs() : HasMany
    {
        return $this->hasMany(Bug::class, 'status_id');
    }

}
