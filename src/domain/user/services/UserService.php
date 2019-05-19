<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/15/2019
 * Time: 21:40
 */

namespace Domain\User\Services;

use chillerlan\QRCode\QRCode;
use Domain\User\Entities\UserEntity;
use Domain\User\Services\UserServiceInterface;
use Domain\User\Repositories\UserRepositoryInterface;

class UserService
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

    public function createUser(UserEntity $user)
    {
        // TODO: Implement createUser() method.
        $newUser = $this->userRepository->createUser($user);
        return $newUser;
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
        $user = $this->getById($id);
        if ($user) {
            $result = $this->userRepository->deleteById($id);
            return true;
        }
        else return false;
    }

    public function generateQR($data)
    {
        // TODO: Implement generateQR() method.
        return (new QRCode())->render($data);
    }

}