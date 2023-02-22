<form action="/admin/products/store" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" value="<?=old('title')?>" class="form-control" name="title">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Thuộc danh mục</label>
                <select class="form-control" name="menu_id">
                 
                    <option value="0">Danh mục cha</option>
                    
                   <?=\App\Helpers\Helper::getMenuIsActiveShowSelect($menus)?>



                    
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Giá gốc</label>
                <input type="text" value="<?=old('price')?>" class="form-control" name="price">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Giá giảm</label>
                <input type="text" value="<?=old('price_sale')?>" class="form-control" name="price_sale">
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label>Mô tả ngắn về danh mục</label>
                <input type="text" class="form-control" name="description">
            </div>
        </div>

        
        <div class="col-md-12">
            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea class="form-control" name="content" id="content"> <?=old('content')?> </textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Ảnh nền *</label>
                
                    <input type="file" id="file" class="form-control" accept="image/*">


                <div class="show-image d-none">
                    <a href="" target="_target" id="thumb_href">
                        <img src="" id="thumb_url" class="img-fluid" style="width:100px" >
                        <input type="hidden" name="thumb" value=" ">

                    </a>

                </div>
                        
            </div>

            
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

<script>
    CKEDITOR.replace('content');
</script>