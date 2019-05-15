<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/15/2019
 * Time: 21:40
 */

namespace App\User\Services;

use Domain\User\Services\UserServiceInterface;
use Domain\User\Repositories\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->userRepository = $repository;
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        $user = $this->userRepository->getById($id);
        return $user;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        $users = $this->userRepository->getAll();
        return $users;
    }

}