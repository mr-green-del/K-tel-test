<?php

    class User
    {

        public static function checkUserData($login, $password)
        {
            $valuesArray = [
                'login'    => $login,
                'password' => $password,
            ];

            $sql = "SELECT * FROM users WHERE login= :login AND password= :password";

            $result = DB::select_from($sql, $valuesArray);

            if($result == [])
            {
                return false;
            }

            return true;
        }

        public static function checkLogged()
        {
            if(!isset($_SESSION['user']))
            {
                $_SESSION['error'] = 'Нужно войти в свой аккаунт';
                header('Location: /');
                exit;
            }

            return $_SESSION['user'];
        }

        public static function auth($user_id)
        {
            $_SESSION['user'] = $user_id;
        }
    }

?>