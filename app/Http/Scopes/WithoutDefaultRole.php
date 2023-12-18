<?php

namespace App\Http\Scopes;

use Illuminate\Database\Eloquent\{Builder, Model, Scope};


class WithoutDefaultRole implements Scope
{
    /**
     * @param Builder $builder
     * @param Model   $model
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('id', '!=', 2);
    }
}
