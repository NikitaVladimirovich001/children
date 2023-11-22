<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TimelistSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="timelist-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'circle_id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'den') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
