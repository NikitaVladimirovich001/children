<?php

use yii\bootstrap5\Html;
use yii\helpers\Url;
?>
<aside style="margin-left: -89px">
    <span class="logo">Админка</span>

    <ul>
        <a href="<?php echo Url::toRoute(['site/'])?>"><li><i class="fa fa-solid fa-check"></i>Выйти</li></a>
    </ul>
    <h3>Основные</h3>
    <ul>
        <a href="<?php echo Url::toRoute(['proposal/index'])?>"><li><i class="fas fa-home"></i>Заявки</li></a>
        <a href="<?php echo Url::toRoute(['category/index'])?>"><li><i class="fas fa-address-card"></i>Категории по возросту</li></a>
        <a href="<?php echo Url::toRoute(['circle/index'])?>"><li><i class="fa fa-solid fa-check"></i>Кружки</li></a>
        <a href="<?php echo Url::toRoute(['timelist/index'])?>"><li><i class="fa fa-solid fa-check"></i>Расписание</li></a>
    </ul>
</aside>
