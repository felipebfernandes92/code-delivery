<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Services\ClientService;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\UserRepository;

class ClientsController extends Controller
{

    private $repository;
    private $userRepository;
    private $clientService;

    public function __construct(ClientRepository $repository, ClientService $clientService, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->clientService = $clientService;
    }

    public function index() {

        $clients = $this->repository->all();

        return view('admin.clientes.index', compact('clients'));
    }

    public function create() {
        return view('admin.clientes.gerenciar');
    }

    public function store(AdminClientRequest $request)
    {
        $data = $request->all();
        $this->clientService->create($data);

        return redirect()->route('admin.clientes.index');
    }

    public function edit($id) {
        $client = $this->repository->find($id);

        return view('admin.clientes.gerenciar', compact('client'));
    }

    public function update(AdminClientRequest $request, $id)
    {
        $data = $request->all();

        $this->clientService->update($data, $id);

        return redirect()->route('admin.clientes.index');
    }

    public function destroy($id) {
        $this->repository->delete($id);

        return redirect()->route('admin.clientes.index');
    }
}
