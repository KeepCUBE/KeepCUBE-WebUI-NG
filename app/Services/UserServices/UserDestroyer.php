<?php declare(strict_types=1);
namespace KC\Services\UserServices;

use KC\Models\User\UserRepositoryInterface;

class UserDestroyer {
    private $userRepository;
    public function __construct(UserRepositoryInterface $repository) {
        $this->userRepository = $repository;
    }
    public function delete(int $id): bool {
       return $this->userRepository->delete($id);
    }
}