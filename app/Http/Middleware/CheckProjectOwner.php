<?php

namespace LaravelProject\Http\Middleware;

use Closure;
use LaravelProject\Repositories\ProjectRepository;

class CheckProjectOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(ProjectRepository $repository){
        $this->repository = $repository;
    }


    public function handle($request, Closure $next)
    {
        $userId= \Authorizer::getResourceOwnerId();
        $projectId = $request->project;

        return $this->repository->isOwner($projectId, $userId)==false;

        return $next($request);
    }
}
