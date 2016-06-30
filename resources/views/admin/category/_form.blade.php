<div class="form-group">
    <label for="catename" class="col-sm-2 control-label">标签</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="catename" id="catename" placeholder="catename" value="{{$data['catename']}}">
    </div>
</div>
<div class="form-group">
    <label for="describe" class="col-sm-2 control-label">描述</label>
    <div class="col-sm-8">
        <textarea name="describe" class="form-control" rows="6" placeholder="describe">{{$data['describe']}}</textarea>
    </div>
</div>
<div class="form-group">
    <label for="icon" class="col-sm-2 control-label">图标</label>
    <div class="col-sm-8">
        <span class="col-md-7" style="padding: 0">
            <input type="text" class="form-control" name="icon" id="icon" placeholder="icon" value="{{$data['icon']}}">
        </span>
        <span class="col-md-5 pull-right">
            <button type="button" class="col-sm-4 show_up_img_box btn btn-primary">上传图片</button>
        </span>
    </div>

</div>
<div class="form-group bg-info upload_img_box">
    <label class="col-sm-2 control-label" id="filePicker">选择图片</label>
    <div class="col-sm-8">
        <div id="uploader-demo">
            <!--用来存放item-->
            <div id="fileList" class="uploader-list" style="width: 700px;"></div>
        </div>
    </div>
</div>
