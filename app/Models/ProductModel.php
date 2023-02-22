<?php
namespace App\Models;
use System\Src\Model;

class ProductModel extends Model{
    protected $table = 'products';
    public function insert($data){
        return $this->insertFirst($data,$this->table);
    }




    public function get($limit =10 , $offset = 0){
        $sql = "SELECT products.*, menus.title as title_menu
        FroM $this->table left JOIN menus on $this->table.menu_id = menus.id 
        order by $this->table.id desc limit $limit offset $offset
       ";
        return $this->query($sql);
    }
    public function countRows(){
        $sql = "SELECT id FROM $this->table ";
        return $this->numRow($sql);
    }
}