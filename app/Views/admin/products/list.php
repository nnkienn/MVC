<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Danh Mục </th>
            <th>Trạng thái </th>
            <th>Ảnh đại diện </th>
            <th>Cập nhật </th>
            <th>Ngày</th>
            <th>Sửa</th>
            <th>Xóa</th>

        </tr>

    </thead>
    <tbody>
        <?php if($products->num_rows > 0){
        
        while($row = $products->fetch_assoc()) { ?>
        <tr>
            <td><?=$row['id'] ?></td>
            <td><?=$row['title'] ?></td>
            <td><?=$row['title_menu']??'Đã xóa' ?> </td>
            <td><?=\App\Helpers\Helper::getIsActive($row['is_active']) ?> </td>
            <td>
                <a href="<?= $row['thumb']?> " taget="_blank">

                    <img src="<?= $row['thumb']?>" style="width:70px ; height:70px">
                </a>
            </td>
            <td> <?=$row['created_at'] ?>' </td>
            <td> <?=$row['updated_at'] ?>' </td>
            <td><a href="/admin/products/edit/{id}'  <?=$row['id'] ?>'">Sửa</a></td>
            <td><a href="#" onclick="deleteRow(<?=$row['id'] ?>,'/admin/product/delete'">Xóa</a> </td>

        </tr>

        <?php }} ?>
    </tbody>
</table>

<?=$pages?>