<?php

namespace CodeDelivery\Http\Controllers\Api\Client;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var OrderService
     */
    private $service;

    private $with = ['client', 'cupom', 'items'];

    public function __construct(
        OrderRepository $orderRepository,
        UserRepository $userRepository,
        OrderService $service
    )
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->service = $service;
    }

    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($id)->client->id;
        $orders = $this->orderRepository
            ->skipPresenter(false)
            ->with($this->with)
            ->with('items')->scopeQuery(function ($query) use ($clientId) {
            return $query->where('client_id', '=', $clientId);
        })->paginate();

        return $orders;
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->all();

        $id = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($id)->client->id;
        $data['client_id'] = $clientId;
        $order = $this->service->create($data);

        return $this->orderRepository
            ->skipPresenter(false)
            ->with($this->with)
            ->find($order->id);
    }

    public function show($id)
    {
        return $this->orderRepository
            ->skipPresenter(false)
            ->with(['client', 'items', 'cupom'])->find($id);
    }
}