<?php use yii\bootstrap5\LinkPager;
use yii\helpers\Url;

$this->title = 'Кружки'; ?>
<div class="h" style="margin-left: 19px"><h1 style="color: #3d3a3a;">Кружки</h1><hr></div>
<div class="glav-block" style="display: flex; ">
   <div class="2344" style="display: flex; flex-direction: column;">
       <!--Кружки-->
       <div class="container-circle" style="width: 1000px">
           <div class="circle-glav" style="display: flex; flex-wrap: wrap;">
               <?php foreach ($circle as $item):?>
                   <div class="card" style="width: 18rem; margin-left: 20px; margin-top: 20px">
                       <img src="../image/<?= $item->image ?>" class="card-img-top" alt="..." style="width: 286px; height: 194px">
                       <div class="card-body">
                           <p class="card-text"><?= $item->name ?></p>
                           <a href="<?=Url::toRoute(['site/circle', 'id' => $item->id, 'circle_id'=>$item->id]);?>" class=""><p>Подробнее</p></a>
                       </div>
                   </div>
               <?php endforeach;?>
           </div>
       </div>
       <div class="wer" style="    margin-left: 19px;
    margin-top: 24px;">
           <?php
           echo LinkPager::widget([
               'pagination' => $pages,
           ]);
           ?>
       </div>
   </div>
    <!--Категории-->
    <div class="df" style="display: flex; margin-top: 20px;">
        <div class="io" style="margin-left: 20px">
            <div class="card" style="width: 18rem; padding: 10px">
                <p class="card-text">Кружки для определенного возроста</p>
                <?php foreach ($categories as $category):?>
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?=Url::toRoute(['site/mycategory', 'id' => $category['id']]);?>" style="text-decoration: none;"><?php echo $category['name']?></a></h5>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<br>
<div class="ras" style="    width: auto;
    height: auto;
    padding: 13px;
    border-radius: 30px;
    background: #ecece5;">
    <h2 style="margin-left: 502px; color: #0a58ca">Расписание</h2>
    <br>
    <div class="" style="max-width: 1000px; margin-left: 126px">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Кружок</th>
                <th scope="col">Возрост</th>
                <th scope="col">Дата</th>
                <th scope="col">День</th>
                <th scope="col">Время</th>
            </tr>
            </thead>
            <?php foreach ($time as $item):?>
                <tbody>
                <tr>
                    <th><?php echo $item['id']?></th>
                    <td><?php echo $item->circle->name?></td>
                    <td><?php echo $item->category->name?></td>
                    <td><?php echo $item['data']?></td>
                    <td><?php echo $item['den']?></td>
                    <td><?php echo $item['time']?></td>
                </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>

</div>
