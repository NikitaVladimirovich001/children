<?php use yii\bootstrap5\LinkPager;
use yii\helpers\Url;

$this->title = 'Комментарии'; ?>

<!--Коментарии-->
<br>
<center style="    margin-left: -109px;"><h3>Комментарии</h3></center>
<br>
<?php foreach ($comments as $item):?>
    <div class="card">
        <div class="card-body">
            <p><?= $item->user->username ?> пишет...</p>
            <p class="card-text"><?= $item->body ?></p>
            <p class="card-text">Дата: <?= $item->created_at ?></p>
            <p class="card-text">Пишу к статье: <?= $item->circle->name ?></p>
        </div>
    </div>
<?php endforeach;?>
<h6 class="card-title"><a href="<?=Url::toRoute(['site/about']);?>">назад</a></h6>

