<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo, SoftDeletes};
use Illuminate\Support\Facades\Auth;

class Bug extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id', 'title', 'description', 'point', 'exp', 'created_by', 'project_id',  'images','status_id','responsible_admin'
    ];
    public $timestamps = true;
    public array $searchRelationShip = [
        'project' => ['id', 'title_ar','title_en'],
        'admin'   => ['id', 'name_ar','name_en'],
        'status'  => ['id', 'title_ar', 'title_en']
    ];

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
        'project'     => 'like',
        'level'       => 'like',
        'title'       => 'like',
        'exp'         => 'like'
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
    public function responsible(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'responsible_admin');
    }

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return BelongsTo
     */
    public function status() : BelongsTo
    {
        return $this->belongsTo(Status::class);
    }


}
