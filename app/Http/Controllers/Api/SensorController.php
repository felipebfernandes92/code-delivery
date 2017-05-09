<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\SensorRepository;
use Illuminate\Http\Request;
use Dmitrovskiy\IonicPush\PushProcessor;

class SensorController extends Controller
{

    private $repository;
    private $pushProcessor;

    public function __construct(
        SensorRepository $repository,
        PushProcessor $pushProcessor
    )
    {
        $this->repository = $repository;
        $this->pushProcessor = $pushProcessor;
    }

    public function update(Request $request)
    {
        $dados = $request->all();
        $sensor = $this->repository->findByField('name', $dados['name'])->first();

        if($sensor) {
            $sensor['status'] = $dados['status'];
            $sensor->save();

            if ($sensor->client->user->device_token && $dados['status'] == 2) {
                $this->pushProcessor->notify([$sensor->client->user->device_token], [
                    'message' => "Sua água está acabando!"
                ]);
            }
        }

        return $sensor;
    }

}