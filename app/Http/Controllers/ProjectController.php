<?php

namespace LaravelProject\Http\Controllers;

use Illuminate\Http\Request;
use LaravelProject\Repositories\ProjectRepository;
use LaravelProject\Services\ProjectService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class ProjectController extends Controller

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

    public function __construct(ProjectRepository $repository, ProjectService $service) {

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
        $userId= Authorizer::getResourceOwnerId();
        if($this->repository->isOwner($id, $userId)==false){
           return ['success'=>false];
        }

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
