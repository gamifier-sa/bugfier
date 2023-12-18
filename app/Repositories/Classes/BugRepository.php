<?php

namespace App\Repositories\Classes;

use App\Models\Bug;
use App\Repositories\Interfaces\{IAdminRepository, IMainRepository};
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

    public function findBy(Request $request): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->all(relations:['project' => ['id','title'],'user' => ['id','name']], orderBy: $request->order);
    }

    /**
     * @param $data
     */
    public function store($data) : void
    {
//        if (request()->hasFile('images')) {
//            $file = request()->file('images');
//            $imagesName = time() . '.' . $file->getClientOriginalExtension();
//            $file->move(public_path('images'), $imagesName);
//            $data['images'] = $imagesName;
//            $data = [
//                'name' => 'My Logo',
//                'description' => 'This is my images',
//            ];
//
//            $fileNameServer = 'images.' . \request('images')->getClientOriginalExtension();
//            $path = '/path/to/store/images';
//            $type = 'images';
//
//
//            $this->media_upload($data, \request(), $fileNameServer, $path, $type);
//        }
//        $this->media_upload($data, request(), "fileNameServer", "path", "type");
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
