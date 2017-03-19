<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UserController extends Controller
{

    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function authenticated()
    {
        $id = Authorizer::getResourceOwnerId();
        return $this->repository->skipPresenter(false)->find($id);
    }

}