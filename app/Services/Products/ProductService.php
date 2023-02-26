<?php

namespace App\Services\Products;
use System\Src\Session;
class ProductService {
    PUBLIC FUNCTION handlePrice(float $price = 0,float $priceSale = 0){
        if($price !=0 && $priceSale !=0 && $price < $priceSale){
            session::flash('error', 'Giá giảm nhỏ hơn giá gốc');
            return false;
        }
        if($price == 0 && $priceSale != 0){
            session::flash('error', 'Phải có giá gốc');
            return false;
        }

        return true;

    }
    
}