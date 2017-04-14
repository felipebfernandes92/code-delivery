<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Http\Requests;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests\AdminCategoryRequest;

class CategoriesController extends Controller
{

    private $repository;

    public function __construct(CategoryRepository $repository) {
        $this->repository = $repository;

    }

    public function index() {

        $categories = $this->repository->all();

        return view('admin.categorias.index', compact('categories'));
    }

    public function create() {
        return view('admin.categorias.gerenciar');
    }

    public function store(AdminCategoryRequest $request) {

        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.categorias.index');
    }

    public function edit($id) {
        $category = $this->repository->find($id);
        return view('admin.categorias.gerenciar', compact('category'));
    }

    public function update(AdminCategoryRequest $request, $id) {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.categorias.index');
    }
}
