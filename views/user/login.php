<?php require_once ROOT. '/views/layouts/header.php'; ?>

    <div class="container">
        <div class="row">

            <div class="col-sm-4 mt-5 offset-4">
                <h3 class="text-center">Вход</h3>
                <?php if(isset($errors) && $errors != false): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                            <?php echo $error; ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <form method="post">

                    <label for="exampleInputEmail1">Логин</label>
                    <input type="text" name="login" class="form-control" value="<?php echo $login;?>"required>

                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password;?>" required>
                    <br>
                    <button type="submit" name="submit" class="btn btn-block btn-outline-primary">Войти</button>

                </form>
            </div>
        </div>
    </div>


<?php require_once ROOT. '/views/layouts/footer.php'; ?>
