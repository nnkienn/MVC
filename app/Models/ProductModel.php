<?php
namespace App\Models;
use System\Src\Model;

class ProductModel extends Model{
    protected $table = 'products';
    public function insert($data){
        return $this->insertFirst($data,$this->table);
    }
}