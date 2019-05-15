<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/15/2019
 * Time: 21:42
 */
namespace Domain\User\Services;


interface UserServiceInterface
{
    public function getAll();
    public function getById($id);
}