<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$query=\Yii::$app->request->get("serach");
?>
<div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>搜索</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <form role="form" class="form-inline" method="get">
                <div class="form-group">
                    <label for="search-uuid" class="sr-only">邮箱</label>
                    <input type="text" placeholder="邮箱" id="search-uuid"
                           class="form-control" name="serach[uuid]" value="<?=$query['uuid']?>">
                </div>
                <div class="form-group">
                    <label for="search-nickname" class="sr-only">昵称</label>
                    <input type="text" placeholder="昵称" id="search-nickname"
                           class="form-control" name="serach[name]" value="<?=$query['name']?>">
                </div>
                <div class="form-group">
                    <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
                </div>
            </form>
        </div>
</div>