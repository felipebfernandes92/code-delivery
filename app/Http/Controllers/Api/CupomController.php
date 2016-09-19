<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\CupomRepository;

class CupomController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(
        CupomRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function show($code)
    {
        return $this->repository->skipPresenter(false)->findByCode($code);
    }

}