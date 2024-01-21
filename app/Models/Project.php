<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\HasMany, SoftDeletes};

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'title_ar', 'title_en', 'description_ar', 'description_en',
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
     * [columns that needs to have customed search such as like or where in]
     *
     * @var string[]
     */
    public array $searchConfig = [
        'title_ar' => 'like',
        'title_en' => 'like',
        'description_ar' => 'like',
        'description_en' => 'like',
    ];

    protected $appends = ['create_since', 'title', 'description'];

    /**
     * @return null
     */
    public function getCreateSinceAttribute()
    {
        return $this->created_at?->diffForHumans();
    }

    /**
     * @return mixed
     */
    public function getTitleAttribute() : mixed
    {
        return (getLocale() == 'ar'? $this->title_ar : $this->title_en);
    }

    /**
     * @return mixed
     */
    public function getDescriptionAttribute() : mixed
    {
        return (getLocale() == 'ar'? $this->description_ar : $this->description_en);
    }

    /**
     * @return HasMany
     */
    public function bugs() : HasMany
    {
        return $this->hasMany(Bug::class, 'project_id');
    }
}
