<?php

use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index" style="display: flex">
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
            <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'image',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Category $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    </div>

</div>
