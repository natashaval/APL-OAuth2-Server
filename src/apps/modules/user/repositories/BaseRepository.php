<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/16/2019
 * Time: 00:43
 */

namespace App\User\Repositories;


abstract class BaseRepository
{
    private $db;

    public function __construct($di)
    {
        $this->db = $di['database'];
    }

    protected function getConnection() {
        return $this->db;
    }
}