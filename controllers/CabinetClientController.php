<?php

    class CabinetClientController
    {

        /**
         * @param int $pageId - номер страницы, по умолчанию равен 1
         * @return bool
         */
        public function actionIndex($pageId = 1)
        {
            User::checkLogged();

            // Лимит выводимы записей на странице
            $limit       = 15;

            $clientsList = Client::getClientsList($pageId, $limit);
            $total       = Client::getTotalRecordsInDb();

            $Pagination  = new Pagination($pageId, $limit, '/cabinet/client/page-', 10,$total);
            $pagination  = $Pagination->getHtml();

            require_once ROOT. '/views/cabinetClient/index.php';
            return true;
        }

        public function actionCreate()
        {
            $user_id = User::checkLogged();

            $name        = '';
            $surname     = '';
            $middle_name = '';
            $series      = '';
            $number      = '';
            $birth       = '';
            $phone       = '';
            $email       = '';

            if(isset($_POST['submit']))
            {
                $name        = $_POST['name'];
                $surname     = $_POST['surname'];
                $middle_name = $_POST['middle_name'];
                $series      = $_POST['series'];
                $number      = $_POST['number'];
                $birth       = $_POST['birth'];
                $phone       = $_POST['phone'];
                $email       = $_POST['email'];

                $errors      = false;

                if(trim($name) == '')
                {
                    $errors[] = 'Введите имя';
                }
                elseif(!Client::checkRussianSymbols($name))
                {
                    $errors[] = 'Имя должно содержать только русские буквы';
                }

                if(trim($surname) == '')
                {
                    $errors[] = 'Введите фамилию';
                }
                elseif(!Client::checkRussianSymbols($surname))
                {
                    $errors[] = 'Фамилия должна содержать только русские буквы';
                }

                if(trim($surname) == '')
                {
                    $errors[] = 'Введите отчество';
                }
                elseif(!Client::checkRussianSymbols($middle_name))
                {
                    $errors[] = 'Отчество должна содержать только русские буквы';
                }

                if(!Client::checkPassportSeries($series))
                {
                    $errors[] = 'Введите серию паспорта правильно';
                }

                if(!Client::checkPassportNumber($number))
                {
                    $errors[] = 'Введите номер паспорта правильно';
                }

                if(Client::checkBirthDate($birth) != false)
                {
                    $errors[] = Client::checkBirthDate($birth);
                }


                if(Client::checkPhone($phone) != false)
                {
                    $errors[] = Client::checkPhone($phone);
                }


                if(Client::checkEmeil($email) != false)
                {
                    $errors[] = Client::checkEmeil($email);
                }


                if($errors == false)
                {
                    $client_data = [
                        'name'            => mb_convert_encoding($name,'cp1251',  mb_detect_encoding($name)),
                        'surname'         => mb_convert_encoding($surname,'cp1251',  mb_detect_encoding($surname)),
                        'middle_name'     => mb_convert_encoding($middle_name,'cp1251',  mb_detect_encoding($middle_name)),
                        'passport_series' => $series,
                        'passport_number' => $number,
                        'birth_date'      => $birth,
                        'phone'           => $phone,
                        'email'           => $email,
                    ];

                    $result = Client::createClient($client_data);

                    if($result != false)
                    {
                        $logText = "добавлен клиент, id = $result, id пользователя = $user_id";
                        Logger::newLogRecord($logText);

                        $_SESSION['message'] = 'Данные добавлены успешно';
                        header('Location: /cabinet/client');
                        exit;
                    }
                    else
                    {
                        $errors[] = 'Добавление данных не удалось';
                    }
                }
            }

            require_once ROOT. '/views/cabinetClient/create.php';
            return true;
        }

        public function actionUpdate($client_id)
        {
            $user_id = User::checkLogged();

            $data    = Client::getClientById($client_id);

            if($data == [])
            {
                $_SESSION['errors'] = "Клиента с таким идентификатором в таблице нет";
                header('Location: /cabinet/client');
                exit;
            }


            $data['birth_date'] = date('d.m.Y', strtotime($data['birth_date']));

            $name        = mb_convert_encoding($data['name'], 'UTF-8', 'cp1251');
            $surname     = mb_convert_encoding($data['surname'], 'UTF-8', 'cp1251');
            $middle_name = mb_convert_encoding($data['middle_name'], 'UTF-8', 'cp1251');
            $series      = $data['passport_series'];
            $number      = $data['passport_number'];
            $birth       = $data['birth_date'];
            $phone       = $data['phone'];
            $email       = $data['email'];

            if(isset($_POST['submit']))
            {
                $name        = $_POST['name'];
                $surname     = $_POST['surname'];
                $middle_name = $_POST['middle_name'];
                $series      = $_POST['series'];
                $number      = $_POST['number'];
                $birth       = $_POST['birth'];
                $phone       = $_POST['phone'];
                $email       = $_POST['email'];

                $errors = false;

                if(trim($name) == '')
                {
                    $errors[] = 'Введите имя';
                }
                elseif(!Client::checkRussianSymbols($name))
                {
                    $errors[] = 'Имя должно содержать только русские буквы';
                }

                if(trim($surname) == '')
                {
                    $errors[] = 'Введите фамилию';
                }
                elseif(!Client::checkRussianSymbols($surname))
                {
                    $errors[] = 'Фамилия должна содержать только русские буквы';
                }

                if(trim($surname) == '')
                {
                    $errors[] = 'Введите отчество';
                }
                elseif(!Client::checkRussianSymbols($middle_name))
                {
                    $errors[] = 'Отчество должна содержать только русские буквы';
                }

                if(!Client::checkPassportSeries($series))
                {
                    $errors[] = 'Введите серию паспорта правильно';
                }

                if(!Client::checkPassportNumber($number))
                {
                    $errors[] = 'Введите номер паспорта правильно';
                }

                if(Client::checkBirthDate($birth) != false)
                {
                    $errors[] = Client::checkBirthDate($birth);
                }


                if(Client::checkPhone($phone) != false)
                {
                    $errors[] = Client::checkPhone($phone);
                }


                if(Client::checkEmeil($email) != false)
                {
                    $errors[] = Client::checkEmeil($email);
                }

                if ($errors == false)
                {
                    $client_data = [
                        'id'              => $client_id,
                        'name'            => mb_convert_encoding($name, 'cp1251', mb_detect_encoding($name)),
                        'surname'         => mb_convert_encoding($surname, 'cp1251', mb_detect_encoding($surname)),
                        'middle_name'     => mb_convert_encoding($middle_name, 'cp1251', mb_detect_encoding($middle_name)),
                        'passport_series' => $series,
                        'passport_number' => $number,
                        'birth_date'      => $birth,
                        'phone'           => $phone,
                        'email'           => $email,
                    ];

                    $updatedRows = Client::checkUpdatedRows($data, $client_data);

                    $result = Client::updateClient($client_data);

                    if($result != false)
                    {
                        $logText = "обновлены данные клиента, id = $client_id, id пользователя = $user_id, измененные столбцы: $updatedRows";
                        Logger::newLogRecord($logText);

                        $_SESSION['message'] = 'Данные обновлены успешно';
                        header('Location: /cabinet/client');
                        exit;
                    }
                    else
                    {
                        $errors[] = 'Обновление данных не удалось';
                    }
                }
            }

            require_once ROOT. '/views/cabinetClient/update.php';
            return true;
        }

        public function actionView($client_id)
        {
            $user_id = User::checkLogged();

            $data    = Client::getClientById($client_id);

            if($data == [])
            {
                $_SESSION['errors'] = "Клиента с таким идентификатором в таблице нет";
                header('Location: /cabinet/client');
                exit;
            }

            $data['name']        = mb_convert_encoding($data['name'], 'UTF-8', 'cp1251');
            $data['surname']     = mb_convert_encoding($data['surname'], 'UTF-8', 'cp1251');
            $data['middle_name'] = mb_convert_encoding($data['middle_name'], 'UTF-8', 'cp1251');
            $data['dtu']         = date('d.m.Y H:i:s', strtotime($data['dtu']));

            require_once ROOT. '/views/cabinetClient/view.php';
            return true;
        }
    }

?>