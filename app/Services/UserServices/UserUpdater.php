<?php declare(strict_types=1);
namespace KC\Services\UserServices;

use KC\Models\User\UserRepositoryInterface;

class UserUpdater {
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }
    public function update(int $id, array $input): bool {
        return $this->userRepository->update($id, $input);
    }
}