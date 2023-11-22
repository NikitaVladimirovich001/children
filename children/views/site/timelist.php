<center><h2>Расписание</h2></center>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Кружок</th>
        <th scope="col">Возрост</th>
        <th scope="col">Дата</th>
        <th scope="col">Время</th>
    </tr>
    </thead>
    <?php foreach ($time as $tim):?>
        <tbody>
        <tr>
            <th scope="row"><?php echo $tim['id']?></th>
            <td><?php echo $tim['circle']?></td>
            <td><?php echo $tim['categories']?></td>
            <td><?php echo $tim['date']?></td>
            <td><?php echo $tim['time']?></td>
        </tr>
        </tbody>
    <?php endforeach; ?>
</table>