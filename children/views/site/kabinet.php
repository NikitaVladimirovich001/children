<?php use yii\bootstrap5\Html;
use yii\bootstrap5\LinkPager;
use yii\bootstrap5\Nav;
use yii\helpers\Url;

$this->title = 'Кабинет'; ?>
<div class="" style="    margin: 0 auto;
    width: 941px;
    padding: 20px;
">
    <!--Остольные-->
    <div class=""><img src="../image/45.png" alt="" style="    width: 1000px;
    margin-left: -93px;
"></div>
    <br>
    <h3 style="margin-left: 288px;  color: #0a58ca">Ваши заявления</h3>
    <br>
    <?php foreach ($proposal as $propos):?>
        <div class="card" style="    width: 838px;
         margin-top: 30px">
            <div class="card-body">
                <center>Ребенок: <?php echo $propos->name?></center>
                <p class="card-text">Имя: <?php echo $propos->name?></p>
                <p class="card-text">Фамилия: <?php echo $propos->surname?></p>
                <p class="card-text">Отчество: <?php echo $propos->patronymic?></p>
                <p class="card-text">Возрост: <?php echo $propos->category->name?></p>
                <p class="card-text">Кружок: <?php echo $propos->circle->name?></p>
                <p class="card-text">Статус: <?php echo $propos->getStatus()?></p>
            </div>
        </div>
    <?php endforeach;?>

</div>

