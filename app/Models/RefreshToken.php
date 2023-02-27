<?php

namespace App\Models;

use System\Src\Model;

class RefreshToken extends Model
{
    protected $table = 'refresh_token';

    private function deleteRefreshToken($userId)
    {
        return $this->query("DELETE from $this->table where user_id = $userId ");
    }


    public function insert($data = [])
    {
        $this->deleteRefreshToken($data['user_id']);

        return $this->insertFirst($data, $this->table);
    }

    public function getUserByRefreshToken($refresh_token)
    {
        $sql = "SELECT refresh_token.refresh_token, refresh_token.time_exp, users.* 
            FROM `refresh_token` JOIN users on users.id = refresh_token.user_id 
            where refresh_token.refresh_token = '$refresh_token'";

        return $this->first($sql);
    }
}