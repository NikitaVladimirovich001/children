<?php use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Кружок'; ?>
<!--Остольные-->
<br>
<center style="    margin-left: -109px;"><h3>Кружок</h3></center>
<br>
    <div class="card" style="    width: 838px;
        margin-left: 181px; margin-top: 30px">
        <div class="card-header" style="    margin-left: 63px;"><?php echo $circle['name']?></div>
        <div class="card-body">
            <img src="../image/<?php echo $circle['image']?>" alt="" style="    width: 801px;
        border-radius: 30px;">
            <br>
            <p class="card-text">Описание: <?php echo $circle['opisanie']?> </p>
        </div>
    </div>

<!--Коментарии-->
<br>
<center style="    margin-left: -109px;"><h3 style="color: #0a58ca">Комментарии</h3></center>
<br>
<?php foreach ($comments as $item):?>
<div class="card" style="margin-top: 15px">
    <div class="card-body">
        <div class="d-flex flex-start align-items-center">
            <img class="rounded-circle shadow-1-strong me-3"
                 src="../image/12345.jpg" alt="avatar" width="60"
                 height="60" />
            <div>
                <h6 class="fw-bold text-primary mb-1"><?= $item->user->username ?></h6>
                <p class="text-muted small mb-0">
                    <?= $item->created_at ?>
                </p>
            </div>
        </div>

        <p class="mt-3 mb-4 pb-2">
            <?= $item->body ?>
        </p>

        <p class="mt-3 mb-4 pb-2">
<!--            Пишу к статье: --><?//= $item->circle->name ?>
        </p>

        <div class="small d-flex justify-content-start">
            <a href="#!" class="d-flex align-items-center me-3">
                <i class="far fa-thumbs-up me-2"></i>
                <p class="mb-0">Like</p>
            </a>
            <a href="#!" class="d-flex align-items-center me-3">
                <i class="far fa-comment-dots me-2"></i>
                <p class="mb-0">Comment</p>
            </a>
            <a href="#!" class="d-flex align-items-center me-3">
                <i class="fas fa-share me-2"></i>
                <p class="mb-0">Share</p>
            </a>
        </div>
    </div>
</div>
<?php endforeach;?>


<?php if (!Yii::$app->user->isGuest): ?>
    <div class="" style="padding: 20px">
        <!--Форма отправки комментариев-->
        <?php $form = ActiveForm::begin(['id'=> 'contact-form']); ?>
        <div class="form-group">
            <div class="col-md-12">
                <?php $model = new \app\models\Comment();
                echo $form->field($model, 'body')->textArea([]) ?>
                <?= HTML::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
        <br>
        <h6 class="card-title"><a href="<?=Url::toRoute(['site/about']);?>">назад</a></h6>
    </div>
<?php endif; ?>


<?php //foreach ($comments as $item):?>
<!--    <div class="card">-->
<!--        <div class="card-body">-->
<!--            <p>--><?//= $item->user->username ?><!-- пишет...</p>-->
<!--            <p class="card-text">--><?//= $item->body ?><!--</p>-->
<!--            <p class="card-text">Дата: --><?//= $item->created_at ?><!--</p>-->
<!--                        <p class="card-text">Пишу к статье: --><?//= $item->circle->name ?><!--</p>-->
<!--        </div>-->
<!--    </div>-->
<!--    <br>-->
<?php //endforeach;?>
