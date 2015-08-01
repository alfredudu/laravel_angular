<?php
/**
 * Created by PhpStorm.
 * User: alfre_000
 * Date: 26/07/2015
 * Time: 18:13
 */

namespace LaravelProject\Repositories;

use LaravelProject\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{

    public function model()
    {

        return Client::class;
    }
}