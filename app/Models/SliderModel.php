<?php

namespace App\Models;
use System\Src\Model;


class SliderModel extends model{
    protected $table = 'sliders';



    public function insert($data)
    {
        return $this->insertFirst($data, $this->table);
    }
    public function get()
    {
        return $this->query( "SELECT * from $this->table order by sort_by desc ,id desc ");

     
    }
}