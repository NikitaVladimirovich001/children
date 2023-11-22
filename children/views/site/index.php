<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="" style="
    margin: 0 auto;
    width: 1060px;
    margin-top: 38px;


">
    <div class="" style="display: flex; justify-content: space-between">
        <div class="">
            <h1>О компании</h1>
            <p>Clever — это крупнейший спортивный <br> комплекс, который включает в себя теннисный клуб, школу <br>
                гимнастики и акробатики, клуб единоборств, фитнес-клуб,<br>
                танцевальные студии и секции командных игр.<br>
                <br>
                Здесь вы можете найти не только подходящее спортивное<br>
                направление, но и близких по духу людей, разделяющих<br>
                вашу любовь к развитию тела и духа.</p>
            <?php if (!Yii::$app->user->isGuest): ?>
                <a href="<?=Url::toRoute(['site/proposal']);?>" style=""><button style="    border: none;
    border-radius: 30px;
    width: 151px;
    height: 45px;
    color: white;
    background: #0a58ca">Записаться</button></a>
            <?php else:?>
                <a href="<?=Url::toRoute(['site/login']);?>"><p style="border: none;
    width: 214px;
    height: 45px;
    color: white;
    background: #0a58ca;
    border-radius: 30px;
    padding: 10px;">для записи авторизуйтесь</p></a>
            <?php endif; ?>
        </div>
        <div class="">
            <img src="../image/1.png" alt="" style="width: 577px">
        </div>
    </div>
</div>
