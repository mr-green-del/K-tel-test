<?php

     class UserController
     {

         public function actionLogin()
         {
             if(isset($_SESSION['user']))
             {
                 header('Location: /cabinet');
                 exit;
             }

             $login    = '';
             $password = '';

             if(!empty($_SESSION['error']))
             {
                 $errors [] = $_SESSION['error'];
                 unset($_SESSION['error']);
             }

             if(isset($_POST['submit']))
             {
                 $login    = $_POST['login'];
                 $password = $_POST['password'];

                 $user_id  = User::checkUserData($login, $password);
                 $errors   = false;

                 if(trim($login) == '')
                 {
                     $errors[] = 'Введите логин';
                 }
                 else if(trim($password) == '')
                 {
                     $errors[] = 'Введите пароль';
                 }
                 elseif($user_id == false)
                 {
                     $errors[] = 'Неверный логин или пароль';
                 }

                 if($errors == false)
                 {
                     User::auth($user_id);
                     header('Location: /cabinet');
                     exit;
                 }
             }

             require_once ROOT. '/views/user/login.php';
             return true;
         }

         public function actionLogout()
         {
             echo 'ggg';
             unset($_SESSION['user']);
             header('Location: /');
             exit;
         }
     }


?>