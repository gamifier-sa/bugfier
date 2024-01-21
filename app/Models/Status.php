<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\HasMany, SoftDeletes};

class Status extends Model
{
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'title_ar', 'title_en', 'is_default'
    ];

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
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
        'title_ar' => 'like',
        'title_en' => 'like',
    ];

    protected $appends = ['create_since', 'title'];

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


    /**
     * @return mixed
     */
    public function getTitleAttribute() : mixed
    {
        return (getLocale() == 'ar'? $this->title_ar : $this->title_en);
    }
}
