

<section>
<div class="container_admin">
    <a href="/user/worker/add" class="add_item">
        Добавить работника
    </a>
    <h4 id="admin_list_h4">Список работников</h4>
    <table id="user_order_list"cellspacing="0">
        <tr>
            <th>id работника</th>
            <th>ФИО</th>
            <th>Подразделение</th>
            <th>Должность</th>
            <th>Дата трудоустройства</th>
        </tr>

        <?php foreach ($workers as $worker):?>
        <tr>
            <td><?php echo $worker['id']?></td>
            <td><?php echo $worker['name']?></td>
            <td><?php echo $worker['unit']?></td>
            <td><?php echo $worker['position']?></td>
            <td><?php echo $worker['date_of_employment']?></td>
            <td><a title="Редактировать" href="/user/worker/edit/<?php echo $worker['id']?>" class="del">
                    <img src="../../../../shop-master/template/images/edit.png" alt="">
                </a></td>
            <td><a title="Удалить" href="/user/worker/delete/<?php echo $worker['id']?>" class="del">
                <img src="../../../../shop-master/template/images/del.png" alt="">
            </a></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
</section>
<div class="appendix"></div>

