<?php declare(strict_types=1);
namespace KC\Services\UserServices;

use KC\Models\User\UserRepositoryInterface;
use \stdClass;

class UserCreator {
    private $userRepository;

    public function __construct(UserRepositoryInterface $repository) {
        $this->userRepository = $repository;
    }
    public function store(array $input): stdClass {
        return $this->userRepository->create($input);
    }
}