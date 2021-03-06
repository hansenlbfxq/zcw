<?php
use yii\helpers\Html;
$this->title = '广告新增';
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>广告新增</h5>
                </div>
                <div class="ibox-content">
                    <form id="form" method="post" class="form-horizontal" onsubmit="ajax_submit();return false;" enctype="multipart/form-data">
                      <div class="form-group">
                            <label class="col-lg-2 control-label">广告位</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="postdata[position_id]" required="">
                                    <option value="">--选择广告位--</option>
                                    <?php
                                    if($position){
                                        foreach ($position as $value) {
                                    ?>
                                    <option value="<?=$value->id?>"><?=$value->name?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">连接地址</label>
                            <div class="col-sm-10">
                                <input id="links" type="text" placeholder="连接地址" name="postdata[links]" class="form-control" required="">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">图片</label>
                            <div class="col-sm-10">
                                <input type="file" name="imgs">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">状态</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="postdata[status]">
                                    <option value="0">禁用</option>
                                    <option value="1">启用</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="ladda-button ladda-button-demo btn btn-primary" type="submit" data-style="zoom-in">保 存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>