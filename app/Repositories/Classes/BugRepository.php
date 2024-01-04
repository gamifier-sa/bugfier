<?php

namespace App\Repositories\Classes;

use App\Models\Status;
use App\Models\Bug;
use App\Repositories\Interfaces\{IAdminRepository, IMainRepository};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BugRepository extends BasicRepository implements IAdminRepository, IMainRepository
{
    /**
     * @var array
     */

    protected array $fieldSearchable = [
        'id', 'title', 'description'
    ];

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Bug::class;
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

    public function findBy(Request $request): Collection|array
    {
        return $this->all(relations: ['project' => ['id', 'title'], 'admin' => ['id', 'name_ar','name_en'], 'status' => ['id', 'title']], orderBy: $request->order);
    }

    /**
     * @param $data
     */
    public function store($data): void
    {

        if (isset($data['images'])) {
            $imagesArr = [];
            foreach($data['images'] as $image){
                $imagesArr[] = uploadImage($image,'Bugs');
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
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function show($id) : Model|Collection|Builder|array|null
    {
        return $this->find($id);
    }
    /**
     * @param      $request
     * @param null $id
     */

    public function update($request, $id = null) : Model|Collection|Builder|array|null
    {
        if (isset($request['images'])) {
            $imagesArr = [];
            foreach($request['images'] as $image){
                $imagesArr[] = uploadImage($image,'Bugs');
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
