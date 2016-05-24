<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\UserRepository;

class ClientsController extends Controller
{

    private $repository;
    private $userRepository;

    public function __construct(ClientRepository $repository, UserRepository $userRepository) {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    public function index() {

        $clients = $this->repository->paginate(5);

        return view('admin.clientes.index', compact('clients'));
    }

    public function create() {
        return view('admin.clientes.adicionar');
    }

    public function store(AdminClientRequest $request) {

        $user = $request->user;
        $user['password'] = bcrypt('123456');
        $user['role'] = 'Client';
        $user['remember_token'] = $request->_token;

        $userStore = $this->userRepository->create($user);

        $data = $request->all();
        $data['user_id'] = $userStore->id;
        $this->repository->create($data);

        return redirect()->route('admin.clientes.index');
    }

    public function edit($id) {
        $client = $this->repository->find($id);

        return view('admin.clientes.editar', compact('client'));
    }

    public function update(AdminClientRequest $request, $id) {
        $data = $request->all();
        $user = $request->user;

        $clientUpdate = $this->repository->update($data, $id);
        $this->userRepository->update($user, $clientUpdate->user_id);

        return redirect()->route('admin.clientes.index');
    }

    public function destroy($id) {
        $this->repository->delete($id);

        return redirect()->route('admin.clientes.index');
    }
}
