<?php

namespace App\Models;

use System\Src\Model;
class MenuModel extends Model{
    protected $table = 'menus';
    public function insert($data){
        return $this->insertFirst($data,$this->table);
    }
}