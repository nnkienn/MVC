<form action="/admin/products/update/<?=$products['id']?>" method="POST">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" value="<?=$products['title']?>" class="form-control" name="title">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Giá gốc</label>
                <input type="number" value="<?=old('price')?>" class="form-control" name="price">
            </div>
        </div>

            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <label>Mô tả ngắn về danh mục</label>
                <textarea class="form-control" name="description"><?=$products['description']?></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Ảnh đại diện</label>
                <input type="file" id="file" class="form-control" accept="image/*">

                <div class="show-image">
                    <a href="<?=$products['thumb']?>" target="_target" id="thumb_href">
                        <img src="<?=$products['thumb']?>" id="thumb_url" class="img-fluid" style="width: 100px">
                    </a>

                    <input name="thumb" type="hidden" value="">
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Trạng thái</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="active"
                         name="is_active" value="1" <?=$products['is_active'] == 1 ? 'checked' : ''?>>
                    <label class="form-check-label" for="active">Hiển thị</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="noactive"
                         name="is_active" value="0" <?=$products['is_active'] == 0 ? 'checked' : ''?>>
                    <label class="form-check-label" for="noactive">Ẩn</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Cập Nhật</button>
    </div>
</form>