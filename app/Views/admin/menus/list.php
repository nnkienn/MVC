<table class="table">
    <thead>
        <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Trạng thái </th>
        <th>Ảnh đại diện </th>
        <th>Ngày</th>
        <th>Sửa</th>
        <th>Xóa</th>

        </tr>
       
    </thead>
    <tbody>
        <?=\App\Helpers\Helper::getMenuIsAdmin($menus)?>

    </tbody>
</table>