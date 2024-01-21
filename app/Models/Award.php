<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Award extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id', 'title_ar', 'title_en', 'description_ar', 'description_en', 'point','images'
    ];

    public       $timestamps         = true;
    public array $searchRelationShip = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [];


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

}
