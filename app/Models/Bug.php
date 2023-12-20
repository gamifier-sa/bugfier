<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo};
use Illuminate\Support\Facades\Auth;

class Bug extends Model
{
    protected $fillable = [
        'id', 'title', 'description', 'point', 'created_by', 'project_id',  'images','status','responsible_admin'
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
        'description' => 'like',
        'title' => 'like',

    ];

    protected $appends = ['create_since'];

    /**
     * Boot method to register the creating event.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($bug) {
            $bug->created_by = Auth::id();
        });
    }

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
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

}
