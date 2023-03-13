<?php

namespace Miniframework\Controller;
use Miniframework\Models\UserModel;
use PDO;
class UserController
{
    public function __construct(protected PDO $db)
    {}

    public function index($responce)
    {
        $users = $this->db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_CLASS, UserModel::class);

        return $responce->withJson($users);
    }
}