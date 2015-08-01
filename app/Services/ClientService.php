<?php
/**
 * Created by PhpStorm.
 * User: alfre_000
 * Date: 01/08/2015
 * Time: 18:43
 */

namespace LaravelProject\Services;


use LaravelProject\Repositories\ClientRepository;

class ClientService
{
    protected $repository;

    public function __constructor (ClientRepository $repository){
        $this->repository = $repository;
}

    public function create(array $data){
        return $this->repository->create($data);
    }

    public function update(array $data, $id){
        return $this->repository->update($data,$id);
    }
}