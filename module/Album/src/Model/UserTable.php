<?php
namespace Album\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class UserTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }


    public function checkUser(User $user)
    {
        $data = [
            'login' => $user->login,
            'pass'  => $user->pass,

        ];

        $login =  $user->login;
        $pass =  $user->pass;

        if ($login !='admin' and $pass !='admin1234') {
            return 0;
        }else return 1;

 
    }


}