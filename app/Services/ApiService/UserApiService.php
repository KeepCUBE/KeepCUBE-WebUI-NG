<?php declare(strict_types=1);

namespace KC\Services\ApiService;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use KC\Transformers\UserTransformer;
use KC\Models\User\UserRepository;
use Spatie\Fractal\Fractal;

class UserApiService {
    private $repository;
    public function __construct(UserRepository $repository, Fractal $fractal) {
        $this->repository = $repository;
        $this->fractal = $fractal;
    }
    public function getUsers() {
        $users = $this->repository->findAll();
        return $this->fractal
            ->collection($users, new UserTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter);
    }
}