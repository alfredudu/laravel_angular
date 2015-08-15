<?php
/**
 * Created by PhpStorm.
 * User: alfre_000
 * Date: 01/08/2015
 * Time: 18:43
 */

namespace LaravelProject\Services;


use LaravelProject\Repositories\ClientRepository;
use LaravelProject\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{
    /**
     * @var ClientRepository
     */

    protected $repository;

    /**
     * @var ClientValidator
     */

    protected $validator;

    public function __construct (ClientRepository $repository, ClientValidator $validator){

        $this->repository = $repository;
        $this->validator = $validator;
}

    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
            }
        catch(ValidatorException $e){
        return [
            'error' => true,
            'message' => $e->getMessageBag()
        ];
        }
    }

    /**
     * @param array $data
     * @param $id
     * @return array|mixed
     * @throws ValidatorException
     */
    public function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->setId($id)->passesOrFail();
            $this->repository->update($data, $id);
        }
        catch(ValidatorException $e){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }
}