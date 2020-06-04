<?php require_once ROOT. '/views/layouts/header.php'; ?>

    <div class="container">
        <div class="row">

                <?php if(isset($errors) && $errors != false): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                            <?php echo $error; ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <br>
            <br>
            <h4>Функции личного кабинета</h4>
            <div class="col-9">
                <ul>
                    <li><a href="/cabinet/client">Управление данными клиентов</a></li>
                </ul>
            </div>


        </div>
    </div>


<?php require_once ROOT. '/views/layouts/footer.php'; ?>