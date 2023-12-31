<?php

namespace App\Traits;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use function response;

trait ApiResponseTrait
{
    /* response figure
     *
     *[
     *'data' =>
     *'status' => true, false
     *'message' => ''
     *]
     * */

    public function apiResponse($data = [], $message = "", $code = 200,$errors=[])
    {
        $array = [
            'data' => $data,
            'status' => in_array($code, $this->successCode()) ? 1 : 0,
            'message' => $message,
            'errors' => $errors,
            'pagination' => $this->paginationResponse($data)
        ];
        return response($array, $code);
    }

    public function paginationResponse($data = []) : array
    {
        if (isset(Request()->pagination) && $data) {
            if (isset(Request()->model) && !empty(Request()->model)) {
                if (!is_array(Request()->model)) {
                    $models = explode(',', Request()->model);
                } else {
                    $models = Request()->model;
                }
                foreach ($models as $model) {
                    $pagination[$model] = ['total' => $data[$model]->total(),
                        'perPage' => $data[$model]->perPage(),
                        'currentPage' => $data[$model]->currentPage(),
                        'total_pages' => ceil($data[$model]->Total() / $data[$model]->PerPage())];
                }
            } else {
                $pagination = ['total' => $data->total(),
                    'perPage' => $data->perPage(),
                    'currentPage' => $data->currentPage(),
                    'total_pages' => ceil($data->Total() / $data->PerPage())];
            }
        } else {
            $pagination = [];
        }
        return $pagination;
    }

    public function successCode() : array
    {

        return [
            200, 201, 202
        ];
    }

    public function createResponse($data = [], $message = "")
    {
        return $this->apiResponse($data, $message, 201);
    }

    public function updateResponse($data = [], $message = "")
    {
        return $this->apiResponse($data, $message, 202);
    }

    public function unauthorizedResponse($textError = "")
    {
        return $this->apiResponse([], $textError, 401);
    }

    public function deleteResponse($message = "")
    {
        return $this->apiResponse([], $message, 200);
    }

    public function notFoundResponse($textError = "")
    {
        return $this->apiResponse([], $textError, 404);
    }

    public function unKnowError($textError = null)
    {
        return $this->apiResponse([], $textError ?? 'problem', 400);
    }

    public function apiValidation($messages = "")
    {
        return $this->apiResponse([], "", 422,$messages);
    }

    public function methodNotAllowed($messages = "")
    {
        return $this->apiResponse([], $messages, 405);
    }

    public function unPermissionResponse($textError = "")
    {
        return $this->apiResponse([], $textError, 403);
    }
}
