<?php

namespace App\Repositories\Classes;

use App\Models\Award;
use App\Models\Bug;
use App\Repositories\Interfaces\{IAdminRepository, IMainRepository};
use Illuminate\Http\Request;

class AwardRepository extends BasicRepository implements IAdminRepository, IMainRepository
{
    /**
     * @var array
     */

    protected array $fieldSearchable = [
        'id', 'title', 'description', 'point'
    ];

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Award::class;
    }
    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function getFieldsRelationShipSearchable()
    {
        return $this->model->searchRelationShip;
    }

    public function translationKey()
    {
        return $this->model->translationKey();
    }

    public function findBy(Request $request): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->all(orderBy: $request->order);
    }

    /**
     * @param $data
     */
    public function store($data) : void
    {
        if (isset($data['images'])) {
            $imagesArr = [];
            foreach($data['images'] as $image){
                $imagesArr[] = uploadImage($image,'Awards');
            }
            $data['images'] = serialize($imagesArr);
        }

        $this->create($data);
    }
    public function list()
    {
    }
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function show($id)
    {
        return $this->find($id);
    }
    /**
     * @param      $request
     * @param null $id
     */

    public function update($request, $id = null)
    {
        if (isset($request['images'])) {
            $imagesArr = [];
            foreach($request['images'] as $image){
                $imagesArr[] = uploadImage($image,'Awards');
            }
            $request['images'] = serialize($imagesArr);
        }
        return $this->save($request, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id): mixed
    {
        return $this->delete($id);
    }
}
