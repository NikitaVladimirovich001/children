<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Оставьте обращение';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">

            Благодарим Вас за обращение к нам. Мы ответим вам как можно скорее.
        </div>

        <!--        <p>-->
        <!--            Note that if you turn on the Yii debugger, you should be able-->
        <!--            to view the mail message on the mail panel of the debugger.-->
        <!--            --><?php //if (Yii::$app->mailer->useFileTransport): ?>
        <!--                Because the application is in development mode, the email is not sent but saved as-->
        <!--                a file under <code>--><?//= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?><!--</code>.-->
        <!--                Please configure the <code>useFileTransport</code> property of the <code>mail</code>-->
        <!--                application component to be false to enable email sending.-->
        <!--            --><?php //endif; ?>
        <!--        </p>-->

    <?php else: ?>

        <p>
            Если у вас есть деловые запросы или другие вопросы, пожалуйста, заполните следующую форму, чтобы связаться с нами.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'patronymic') ?>

                <?= $form->field($model, 'surname') ?>

                <?= $form->field($model, 'telefon')->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '+7 (999) 999 99 99',
                ]); ?>

                <?= $form->field($model, 'category_id') ?>

                <?= $form->field($model, 'circle_id') ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
