<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Circle $model */

$this->title = Yii::t('app', 'Create Circle');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Circles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="circle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
