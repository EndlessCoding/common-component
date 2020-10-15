<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OptionService as MyService;

/**
 * 公共列表
 */
class OptionController extends \Controller
{
    private $service = null;

    public function __construct(MyService $service)
    {
        $this->service = $service;
    }

    public function getList(Request $request)
    {
        $params = $request->all();
        $params = http_build_query($params);
        if (empty($params)) {
            return $this->errorRespond('参数必传');
        }

        $this->service->setParams($params);

        $data = [
            'code' => 200,
            'data' => $this->service->list(),
        ];
        return $this->respond($data);
    }
}