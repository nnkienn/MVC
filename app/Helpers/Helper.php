<?php

namespace App\Helpers;

class Helper {
    public static function getMenuIsAdmin($menus,$parentId = 0){
        $html = '';
        foreach( $menus as $key => $menu ){
            if($menu['parent_id'] == $parentId){
                $html .='
                <tr> 
                    <td> '.$menu['id'].'</td>
                    <td> '.$menu['title'].'</td>
                    <td> '.$menu['is_active'].'</td>
                    <td>
                        <a href="'.$menu['thumb'] .'" taget = "_blank">
                        
                        <img src="'.$menu['thumb'].'" style="width:70px ; height:70px">
                        </a>
                    </td>
                    <td> '.$menu['update_at'] .' </td>
                    <td> sửa </td>
                    <td> xóa </td>




                </tr>
                ';
            }
        }
        return $html;
    }
}
?>