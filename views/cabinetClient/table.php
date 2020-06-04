<?php if(isset($clientsList)): ?>



    <table class="table-bordered table-striped table">

        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Отчество</th>
            <th>Серия</th>
            <th>Номер</th>
            <th>Дата рождения</th>
            <th>Номер</th>
            <th>E-mail</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($clientsList as $client): ?>
            <tr>
                <td><?php echo mb_convert_encoding($client['name'],'UTF-8',  'cp1251');?></td>
                <td><?php echo mb_convert_encoding($client['surname'],'UTF-8',  'cp1251');?></td>
                <td><?php echo mb_convert_encoding($client['middle_name'],'UTF-8',  'cp1251');?></td>
                <td><?php echo $client['passport_series']; ?></td>
                <td><?php echo $client['passport_number'];?></td>
                <td><?php echo date('d.m.Y',strtotime($client['birth_date']));?></td>
                <td><?php echo $client['phone'];?></td>
                <td><?php echo $client['email'];?></td>
                <td><a href="/cabinet/client/view/<?php echo $client['id'];?>" title="Просмотреть">&#128269;</a></td>
                <td><a href="/cabinet/client/update/<?php echo $client['id'];?>" title="Редактировать">&#9998;</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="col-sm-3"> <?php echo $pagination; ?> </div>

<?php endif; ?>