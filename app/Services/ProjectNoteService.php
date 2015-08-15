<?php
/**
 * Created by PhpStorm.
 * User: alfre_000
 * Date: 01/08/2015
 * Time: 18:43
 */

namespace LaravelProject\Services;


use LaravelProject\Repositories\ProjectNoteRepository;
use LaravelProject\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectNoteService
{
    /**
     * @var ClientRepository
     */

    protected $repository;

    /**
     * @var ClientValidator
     */

    protected $validator;

    public function __construct (ProjectNoteRepository $repository, ProjectNoteValidator $validator){

        $this->repository = $repository;
        $this->validator = $validator;
}

    public function create(array $data){
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