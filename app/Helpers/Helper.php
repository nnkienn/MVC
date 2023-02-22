<?php

namespace App\Helpers;

class Helper {

    
        public static function getMenuIsActiveShowSelect($menus, $parentId = 0, $string = '')
        {
            $html = '';
            foreach ($menus as $key => $menu) {
                if ($menu['parent_id'] == $parentId) { // so sánh oke
                    $html .= '<option value="' . $menu['id'] . '">' . $string . $menu['title'] . '</option>';
    
                    #xóa đi dữ liệu từ mảng gốc tại vì mình đã gọi ra rồi
                    unset($menus[$key]);
    
                    $html .= self::getMenuIsActiveShowSelect($menus, $menu['id'], '|-----' . $string);
                }
            }
    
            return $html;
        }
    
    public static function getMenuIsAdmin($menus,$parentId = 0,$string=''){
        $html = '';
        foreach( $menus as $key => $menu ){
            if($menu['parent_id'] == $parentId){
                $html .='
                <tr> 
                    <td> '.$menu['id'].'</td>
                    <td> '.$string .$menu['title'].'</td>
                    <td>' . self::getIsActive($menu['is_active']) . '</td>
                    <td>
                        <a href="'.$menu['thumb'] .'" taget = "_blank">
                        
                        <img src="'.$menu['thumb'].'" style="width:70px ; height:70px">
                        </a>
                    </td>
                    <td> '.$menu['update_at'] .' </td>
                    <td><a href="/admin/menus/edit/' . $menu['id'] . '">Sửa</a></td>
                    <td><a href="#" onclick ="deleteRow(' .$menu['id']. ',\'/amdin/menus/delete\')">Xóa</a> </td>




                </tr>
                ';
                unset($menus[$key]);
                $html .=self::getMenuIsAdmin($menus,$menu['id'],'Danh mục con : '  .$string);
            }
        }
        return $html;
    }
    public static function getIsActive($active = 1)
    {
        return $active == 1
            ? '<span class="badge bg-success">Kích Hoạt</span>'
            : '<span class="badge bg-danger">Không kích hoạt</span>';
    }

}
?>