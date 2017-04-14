<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\CupomRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests\AdminCupomRequest;

class CupomsController extends Controller
{

    private $repository;

    public function __construct(CupomRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index() {

        $cupoms = $this->repository->paginate(5);

        return view('admin.cupons.index', compact('cupoms'));
    }

    public function create() {
        return view('admin.cupons.gerenciar');
    }

    public function store(AdminCupomRequest $request) {

        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.cupons.index');
    }

    public function edit($id) {
        $cupom = $this->repository->find($id);
        return view('admin.cupons.gerenciar', compact('cupom'));
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.cupons.index');
    }
}
