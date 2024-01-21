<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Level extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id', 'name_ar', 'name_en', 'exp'
    ];

    public array $searchRelationShip = [];


    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [];
    /**
     * [columns that needs to have level search such as like or where in]
     *
     * @var string[]
     */
    public array $searchConfig = [
        'name_ar' => 'like',
        'name_en' => 'like',
    ];
    protected $appends = ['create_since', 'name'];

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
    public function getNameAttribute() : mixed
    {
        return (getLocale() == 'ar'? $this->name_ar : $this->name_en);
    }
}
