<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminSensorRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\SensorRepository;

class SensorController extends Controller
{
    private $repository;
    private $clientRepository;

    public function __construct(SensorRepository $repository, ClientRepository $clientRepository)
    {
        $this->repository = $repository;
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        $sensors = $this->repository->all();
        $status = ['0' => 'Desligado', '1' => 'Ligado', '2' => 'Sem água'];

        return view('admin.sensores.index', compact('sensors', 'status'));
    }

    public function create()
    {
        $clients = $this->clientRepository->all();
        $status = ['0' => 'Desligado', '1' => 'Ligado', '2' => 'Sem água'];

        return view('admin.sensores.gerenciar', compact('clients', 'status'));
    }

    public function store(AdminSensorRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.sensores.index');
    }

    public function edit($id) {
        $sensor = $this->repository->find($id);
        $clients = $this->clientRepository->all();
        $status = ['0' => 'Desligado', '1' => 'Ligado', '2' => 'Sem água'];

        return view('admin.sensores.gerenciar', compact('sensor', 'clients', 'status'));
    }

    public function update(AdminSensorRequest $request, $id) {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.sensores.index');
    }

    public function destroy($id) {
        $this->repository->delete($id);

        return redirect()->route('admin.sensores.index');
    }
}
