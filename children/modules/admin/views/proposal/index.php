<?php

use app\models\Proposal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProposalSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Proposals');

?>
<div class="proposal-index" style="display: flex">
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
    <div class="2" style="margin-left: 20px">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a(Yii::t('app', 'Create Proposal'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'surname',
                'patronymic',
                'telefon',
                //'category_id',
                [
                    'attribute' => 'status',
                    'value' => function ($date)
                    {
                        return $date->getStatus();
                    }
                ],
                //'circle_id',
                //'image',
                [
                    'attribute'=>'Администрирование',
                    'format'=>'html',
                    'value'=>function($data){
                        switch ($data->status){
                            case 1:
                                return Html::a('Одобрить', 'good/?id='.$data->id)."|".
                                    Html::a('Отклонить', 'verybad/?id='.$data->id);

                            case 2:
                                return Html::a('Отклонить', 'verybad/?id='.$data->id);

                            case 3:
                                return Html::a('Одобрить', 'good/?id='.$data->id);
                        }
                    }
                ],
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Proposal $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    </div>
</div>
