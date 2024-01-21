<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;

trait ChangeTrait
{

    /**
     * @param $dataset
     * @param $key
     * @param $value
     * @return Collection|mixed
     */
    public function change($dataset, $key, $value) : mixed
    {
        if ($dataset instanceof Collection) {
            foreach ($dataset as $data) {
                $data[$key] = $value;
                $data->update();
            }
        } else {
            $dataset[$key] = $value;
            $dataset->update();
        }
        return $dataset;
    }
}
