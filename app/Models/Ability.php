<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $guarded = [];
    protected $casts   = ['created_at', 'updated_at' => 'date:Y-m-d'];


    public array $searchRelationShip = [];
}
