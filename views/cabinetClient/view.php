<?php require_once ROOT. '/views/layouts/header.php'; ?>

    <div class="container">
        <a href="/cabinet/client">&larr; назад</a>
        <div class="row">



            <div class="col-sm-6 mt-5 offset-3">
                <h3 class="text-center">Просмотреть данные клиента</h3>
                <br>

                    <table class="table">
                        <tr>
                            <td><label>Имя </label></td>
                            <td><?php echo $data['name']; ?></td>
                        </tr>
                        <tr>
                            <td><label>Фамилия </label></td>
                            <td><?php echo $data['surname']; ?></td>
                        </tr>
                        <tr>
                            <td><label>Отчество </label></td>
                            <td><?php echo $data['middle_name']; ?></td>
                        </tr>
                        <tr>
                            <td><label>Паспорт серия </label></td>
                            <td><?php echo $data['passport_series']; ?></td>
                        </tr>
                        <tr>
                            <td><label>Паспорт номер </label></td>
                            <td><?php echo $data['passport_number']; ?></td>
                        </tr>
                        <tr>
                            <td><label>Дата рождения </label></td>
                            <td><?php echo $data['birth_date']; ?></td>
                        </tr>
                        <tr>
                            <td><label>Номер телефона </label></td>
                            <td><?php echo $data['phone']; ?></td>
                        </tr>
                        <tr>
                            <td><label>E-mail </label></td>
                            <td><?php echo $data['email']; ?></td>
                        </tr>
                        <tr>
                            <td><label>Дата последнего обновления данных </label></td>
                            <td><?php echo $data['dtu']; ?></td>
                        </tr>

                    </table>

            </div>


        </div>
    </div>


<?php require_once ROOT. '/views/layouts/footer.php'; ?>