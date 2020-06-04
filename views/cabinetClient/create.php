<?php require_once ROOT. '/views/layouts/header.php'; ?>

    <div class="container">
        <a href="/cabinet/client">&larr; назад</a>
        <div class="row">

            <div class="col-sm-6 mt-5 offset-3">
                <h3 class="text-center">Добавить клиента</h3>

                <?php if(isset($errors) && $errors != false): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                            <?php echo $error; ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form method="post">

                    <table>
                        <tr>
                            <td><label>Имя (только русские символы): </label></td>
                            <td><input type="text" name="name" class="form-control" value="<?php echo $name; ?>"
                                       placeholder="Алексей" required></td>
                        </tr>
                        <tr>
                            <td><label>Фамилия (только русские символы): </label></td>
                            <td><input type="text" name="surname" class="form-control" value="<?php echo $surname; ?>"
                                       placeholder="Кратько" required></td>
                        </tr>
                        <tr>
                            <td><label>Отчество (только русские символы): </label></td>
                            <td><input type="text" name="middle_name" class="form-control" value="<?php echo $middle_name; ?>"
                                       placeholder="Иванович" required></td>
                        </tr>
                        <tr>
                            <td><label>Паспорт серия (четыре цифры): </label></td>
                            <td><input type="text" name="series" class="form-control" value="<?php echo $series; ?>"
                                       placeholder="0000" required></td>
                        </tr>
                        <tr>
                            <td><label>Паспорт номер (шесть цифр): </label></td>
                            <td><input type="text" name="number" class="form-control" value="<?php echo $number; ?>"
                                       placeholder="000000" required></td>
                        </tr>
                        <tr>
                            <td><label>Дата рождения в формате дд.мм.гггг: </label></td>
                            <td><input type="text" name="birth" class="form-control" value="<?php echo $birth; ?>"
                                       placeholder="дд.мм.гггг" required></td>
                        </tr>
                        <tr>
                            <td><label>Номер телефона, начинается с 8: </label></td>
                            <td><input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>"
                                       placeholder="89876542323" required></td>
                        </tr>
                        <tr>
                            <td><label>E-mail</label></td>
                            <td><input type="text" name="email" class="form-control" value="<?php echo $email; ?>"
                                       placeholder="email@example.com" required></td>
                        </tr>

                    </table>

                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">Сохранить</button>

                </form>
            </div>


        </div>
    </div>


<?php require_once ROOT. '/views/layouts/footer.php'; ?>