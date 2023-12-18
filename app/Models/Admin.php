<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id', 'name_ar', 'name_en', 'email', 'phone','image','password','status'
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
        return $this->belongsToMany(Role::class)->where('id','!=',2)->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function abilities() : mixed
    {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
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
