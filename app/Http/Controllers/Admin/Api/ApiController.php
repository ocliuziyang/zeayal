<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ApiController
 * @package App\Http\Controllers\Admin\Api
 */
class ApiController extends Controller {

    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth.api');
    }

    public function responseWithData($data, $transformer)
    {
        if ($data instanceof Model) {
            //1.返回单个模型数据
            return $this->responseWithItem($data, $transformer);

        } else if ($data instanceof Collection || $data instanceof LengthAwarePaginator) {
            //2.返回模型集合
            return $this->responseWithCollection($data, $transformer);

        } else {
            //3.查询数据出错
            return $this->errorWithInternetServer();
        }
    }


    public function responseWithSuccessMsg($msg='操作成功')
    {
        return $this->responseWithArray([
            'status' => 1,
            'message' => $msg
        ]);
    }

    public function responseWithErrorMsg($msg='操作失败')
    {
        return $this->responseWithArray([
            'status' => 0,
            'message' => $msg
        ]);
    }


    /**
     * @param $model
     * @param $transformer
     * @return \Cyvelnet\Laravel5Fractal\Adapters\ScopeDataAdapter
     */
    protected function responseWithItem($model, $transformer)
    {
        return Fractal::item($model, $transformer);
    }

    /**
     * @param $collection
     * @param $transformer
     * @return \Cyvelnet\Laravel5Fractal\Adapters\ScopeDataAdapter
     */
    protected function responseWithCollection($collection, $transformer)
    {
        return Fractal::collection($collection, $transformer);
    }

    protected function responseWithArray(array $data=[], array $header=[])
    {
        return response()->json($data, $this->statusCode, $header);
    }

    /**
     * @param $header
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorWithData($header, $message)
    {
        $data = [
            'message' =>  $message
        ];

        return $this->responseWithArray($data, $header);
    }


    protected function errorWithInternetServer(array $header=[], $message='InternetServerError')
    {
        return $this->setStatusCode(500)->errorWithData($header, $message);
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }


}