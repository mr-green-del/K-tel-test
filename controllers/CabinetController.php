<?php

    class CabinetController
    {

        public function actionIndex()
        {
            User::checkLogged();

            require_once ROOT. '/views/cabinet/index.php';
            return true;
        }
    }


?>