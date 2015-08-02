<?php

namespace LaravelProject\Http\Controllers;

use LaravelProject\Repositories\ClientRepository;
use Illuminate\Http\Request;
use LaravelProject\Services\ClientService;


class ClientController extends Controller

    /**
     * @ var ClientRepository;
     */
{
    private $repository;
    /**
     * @var ClientService
     */
    private $service;

    /**
     * @param ClientRepository $repository
     * @param ClientService $service
     */

    public function __construct(ClientRepository $repository, ClientService $service) {

        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }


    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(),$id);

    }

    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}
