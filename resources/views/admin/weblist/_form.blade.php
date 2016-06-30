<div class="form-group">
    <label for="title" class="col-sm-2 control-label">标题</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $data['title'] }}">
    </div>
</div>
<div class="form-group">
    <label for="imgurl" class="col-sm-2 control-label">图片</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="imgurl" id="imgurl" placeholder="imgurl" value="{{ $data['imgurl'] }}">
    </div>
</div>
<div class="form-group">
    <label for="classify" class="col-sm-2 control-label">分类</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="classify" id="classify" placeholder="classify" value="{{ $data['classify'] }}">
    </div>
</div>
<div class="form-group">
    <label for="direction" class="col-sm-2 control-label">链接</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="direction" id="direction" placeholder="direction" value="{{ $data['direction'] }}">
    </div>
</div>
<div class="form-group">
    <label for="describe" class="col-sm-2 control-label">描述</label>
    <div class="col-sm-8">
        <textarea name="describe" class="form-control" rows="6" placeholder="describe">{{ $data['describe'] }}</textarea>
    </div>
</div>