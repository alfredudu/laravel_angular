<?php

namespace LaravelProject\Http\Controllers;

use LaravelProject\Repositories\ClientRepository;
use Illuminate\Http\Request;


class ClientController extends Controller

    /**
     * @ var ClientRepository;
     */
{
    private $repository;

    public function __construct(ClientRepository $repository) {

        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function store(Request $request)
    {
        return $this->repository->create($request->all());
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }


    public function update(Request $request, $id)
    {
        return $this->repository->find($id)->update($request->all());

    }

    public function destroy($id)
    {
        return $this->repository->find($id)->delete();
    }
}
