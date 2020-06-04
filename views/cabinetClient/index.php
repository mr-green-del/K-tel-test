<?php require_once ROOT. '/views/layouts/header.php'; ?>

    <div class="container">
        <a href="/cabinet">&larr; назад</a>
        <br>
        <h4>Список клиентов</h4>
        <div class="row">


            <div class="col-sm-12">
                <?php if(isset($_SESSION['errors'])): ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['errors'];?></div>
                    <?php unset($_SESSION['errors']);?>
                <?php elseif(isset($_SESSION['message'])): ?>
                    <div class="alert alert-success"><?php echo $_SESSION['message'];?></div>
                    <?php unset($_SESSION['message']);?>
                <?php endif;?>
            </div>

            <br>
            <div class="pt-2 pb-2">
                <a href="/cabinet/client/create" class="btn btn-outline-primary">
                    <b>&#10010;</b> Добавить пользователя
                </a>
            </div>
            <br>



            <?php require_once ROOT. '/views/cabinetClient/table.php'; ?>
        </div>
    </div>

<?php require_once ROOT. '/views/layouts/footer.php'; ?>