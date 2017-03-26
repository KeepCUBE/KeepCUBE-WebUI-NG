<?php declare(strict_types=1);

namespace KC\Services\UserServices;

use KC\Models\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Fractal\Fractal;
use Illuminate\Database\Eloquent\Builder;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use KC\Transformers\UserTransformer;

class UserFetcher {
    private $userRepository;
    private $transformer;
    private $fractal;

    public function __construct(
        UserRepositoryInterface $userRepository, 
        UserTransformer $transformer, 
        Fractal $fractal
    ) {
        $this->userRepository = $userRepository;
        $this->fractal = $fractal;
        $this->transformer = $transformer;
    }
    public function find(int $id): array {
        $user = $this->userRepository->find($id);

        return $this->fractal->item($user, $this->transformer)->toArray();
    }
    public function paginate(array $query = null, int $perPage = 15): array {
        $paginator = $this->filter($query)->paginate($perPage);
        $users = $paginator->getCollection();

        return $this->fractal
            ->collection($users, $this->transformer)
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();
    }
    private function filter(array $query = null): Builder {
        $users = $this->userRepository->newQuery();
        if($query === null) {
            return $users;
        }
        if(array_has($query, 'username')) {
            $users->where('username','=',$query['username']);
        }
        if(array_has($query, 'email')) {
            $users->where('email', '=', $query['email']);
        }

        return $users;
    }

}