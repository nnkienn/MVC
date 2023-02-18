<form action="store" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" class="form-control" name="title">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Thuộc danh mục</label>
                <select class="form-control" name="parent_id">
                    <option value="0">Danh mục cha</option>
                </select>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label>Sắp xếp</label>
                <input type="number" class="form-control" value="1" name="sort_by">
            </div>
        </div>
        <!-- /.card-body -->


        <div class="col-md-12">
            <div class="form-group">
                <label>Mô tả ngắn về danh mục</label>
                <input type="text" class="form-control" name="description">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Ảnh nền *</label>
                <form>
                    <table>
                        
                        <tr>
                            <th>Select File </th>
                            <td>
                              <input type="file" name="file" id="file" class="form-control" name="file" accept="image/*">
                            </td>

                        </tr>
                        <tr>

                        </tr>
                    </table>
                </form>
            </div>
        </div>


        <div class="show-image d-none">
            <a href="" target="_blank" id="thumb_href">

            </a>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="active" name="is_active" value="1">
                    <label for="active" class="form-check-label">Hiển thị</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="noactive" name="is_active" value="0">
                    <label for="active" class="form-check-label">ẩn</label>
                </div>

            </div>


        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>