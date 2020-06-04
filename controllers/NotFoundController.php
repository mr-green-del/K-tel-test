<?php

    class NotFoundController
    {

        public function actionNotFound()
        {

            require_once ROOT. '/views/404/index.php';
            return true;
        }
    }

?>