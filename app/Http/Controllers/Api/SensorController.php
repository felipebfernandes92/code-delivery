<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\SensorRepository;
use Illuminate\Http\Request;

class SensorController extends Controller
{

    private $repository;

    public function __construct(
        SensorRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function update(Request $request)
    {
        $dados = $request->all();
        $sensor = $this->repository->findByField('name', $dados['name'])->first();

        if($sensor) {
            $sensor['status'] = $dados['status'];
            $sensor->save();
        }

        return $sensor;
    }

}