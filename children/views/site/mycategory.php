<?php use yii\bootstrap5\LinkPager;
use yii\helpers\Url;

$this->title = 'Кружки'; ?>
<!--Остольные-->
<br>
<center style="    margin-left: -109px;"><h3>Кружки</h3></center>
<br>
<?php foreach ($circle as $item):?>
    <div class="card" style="    width: 838px;
        margin-left: 181px; margin-top: 30px">
        <div class="card-header" style="    margin-left: 63px;"><?= $item['name'] ?></div>
        <div class="card-body">
            <img src="../image/<?= $item['image'] ?>" alt="" style="    width: 801px;
        border-radius: 30px;">
        </div>
    </div>
<?php endforeach;?>
<h6 class="card-title" style="    margin-left: 185px;"><a href="<?=Url::toRoute(['site/about']);?>">назад</a></h6>
