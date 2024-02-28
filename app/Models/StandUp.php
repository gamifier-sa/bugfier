<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo, SoftDeletes};

class StandUp extends Model
{
    use SoftDeletes;

    protected $guarded = [];


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
    public function admin() : BelongsTo
    {
        return $this->belongsTo(Admin::class,'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function status() : BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
