<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany};
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'name_ar', 'name_en', 'email', 'phone', 'image', 'password', 'status', 'level_id','daily_attendance'
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
        'name_ar' => 'like',
        'name_en' => 'like',
    ];

    protected $appends = ['create_since','full_name'];

    /**
     * @return null
     */
    public function getCreateSinceAttribute()
    {
        return $this->created_at?->diffForHumans();
    }

    /**
     * @param $value
     * @return void
     */
    public function setPasswordAttribute($value) : void
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * @param $role
     * @return Model
     */
    public function assignRole($role) : Model
    {
        return $this->roles()->save($role);
    }

    /**
     * @return BelongsToMany
     */
    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function abilities() : mixed
    {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }

    /**
     * @return HasMany
     */
    public function bugs() : HasMany
    {
        return $this->hasMany(Bug::class, 'created_by');
    }

    /**
     * @return BelongsTo
     */
    public function level() : BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    /**
     * @return HasMany
     */
    public function bugs_responsible_admin() : HasMany
    {
        return $this->hasMany(Bug::class, 'responsible_admin');
    }

    /**
     * @return string
     */
    public function getInfo() : string
    {
        return $this->name . ' - ' . $this->email;
    }

    /**
     * @return mixed
     */
    public function getFullNameAttribute() : mixed
    {
        return (getLocale() == 'ar'? $this->name_ar : $this->name_en);
    }
}
