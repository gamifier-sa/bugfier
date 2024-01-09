<?php

namespace App\Models;

use App\Http\Scopes\WithoutDefaultRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Schema\Builder;


class Role extends Model
{

    use SoftDeletes;
    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'name_ar', 'name_en'
    ];

    /**
     * @var string[]
     */
    protected $appends = ['create_since', 'name'];

    /**
     * @var bool
     */
    public       $timestamps         = true;

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
     * [columns that needs to have customed search such as like or where in]
     *
     * @var string[]
     */
    public array $searchConfig = [
        'name_ar' => 'like',
        'name_en' => 'like',
    ];

    /**
     * @return string
     */
    public function getCreatedAtAttribute() : string
    {
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }

    /**
     * @return void
     */
    protected static function booted() : void
    {
        static::addGlobalScope(new WithoutDefaultRole());
    }

    /**
     * @return mixed
     */
    public function getNameAttribute() : mixed
    {
        return $this->attributes[ 'name_' . getLocale() ];
    }

    /**
     * @return BelongsToMany
     */
    public function admins() : BelongsToMany
    {
        return $this->belongsToMany(Admin::class);
    }

    /**
     * @return BelongsToMany
     */
    public function abilities() : BelongsToMany
    {
        return $this->belongsToMany(Ability::class);
    }
}
