<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests\AdminOrderRequest;

class OrdersController extends Controller
{

    private $repository;
    private $clientRepository;
    private $userRepository;

    public function __construct(OrderRepository $repository, ClientRepository $clientRepository, UserRepository $userRepository) {
        $this->repository = $repository;
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $orders = $this->repository->all();
        $list_status = [0 => 'Pendente', 1 => 'A caminho', 2 => 'Entregue', 3 => 'Cancelado'];

        return view('admin.pedidos.index', compact('orders', 'list_status'));
    }

    public function store(AdminOrderRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.pedidos.index');
    }

    public function edit($id) {
        $order = $this->repository->find($id);

        $list_status = [0 => 'Pendente', 1 => 'A caminho', 2 => 'Entregue', 3 => 'Cancelado'];
        $deliveryMan = $this->userRepository->getListDeliveryMan();

        return view('admin.pedidos.editar', compact('order', 'deliveryMan', 'list_status'));
    }

    public function update(AdminOrderRequest $request, $id) {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.pedidos.index');
    }
}
