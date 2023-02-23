<form action="/admin/sliders/store" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" value="<?=old('title')?>" class="form-control" name="title">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Sắp xếp</label>
                <input type="number" class="form-control" value="1" name="sort_by">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Đường dẫn</label>
                <input type="text" value="<?=old('url')?>" class="form-control" name="url">

            </div>
        </div>

       

        
 

        <div class="col-md-12">
            <div class="form-group">
                <label>Ảnh nền *</label>
                
                    <input type="file" id="file" class="form-control" accept="image/*" required>


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
