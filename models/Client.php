<?php

    class Client
    {

        const SHOW_BY_DEFAULT = 10;

        public static function getClientsList($pageId, $count = self::SHOW_BY_DEFAULT)
        {
            $id = ($pageId - 1) * $count;

            $valuesArray = [
                'count'       => $count,
                'id'          => $id,
            ];

            $sql = "SELECT * FROM clients ORDER BY id DESC LIMIT :count OFFSET :id";

            $clientsList = DB::select_from($sql, $valuesArray, true);

            return $clientsList;
        }

        public static function getTotalRecordsInDb()
        {
            $sql = "SELECT COUNT(*) FROM clients";

            $total = DB::select_from($sql)['COUNT(*)'];

            return $total;
        }

        public static function createClient($data)
        {
            $valuesArray = $data;

            $sql = "INSERT INTO clients (name, surname, middle_name, ".
                   "passport_series, passport_number, birth_date, phone, email) ".
                   "VALUES (:name, :surname, :middle_name, :passport_series, :passport_number, ".
                   "STR_TO_DATE(:birth_date, '%d.%m.%Y'), :phone, :email)";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

        public static function getClientById($id)
        {
            $valuesArray = [
                'id' => $id,
            ];

            $sql = "SELECT * FROM clients WHERE id= :id";

            $result = DB::select_from($sql, $valuesArray);

            return $result;
        }

        public static function checkUpdatedRows($oldData, $newData)
        {
            $updatedRows = '';

            foreach ($newData as $rowName => $rowData)
            {
                if($rowData != $oldData[$rowName])
                {
                    $updatedRows .= $rowName.", ";
                }
            }

            return substr($updatedRows, 0, strlen($updatedRows) - 2);
        }

        public static function updateClient($data)
        {
            $valuesArray = $data;

            $sql = "UPDATE clients SET name= :name, surname= :surname, middle_name= :middle_name, ".
                   "passport_series= :passport_series, passport_number= :passport_number, ".
                   "birth_date= STR_TO_DATE(:birth_date, '%d.%m.%Y'), phone= :phone, email= :email, dtu= NOW() ".
                   "WHERE id= :id";

            $result = DB::update_set($sql, $valuesArray);

            return $result;
        }

        public static function checkRussianSymbols($string)
        {
            if(preg_match('/^[а-яА-Я]+$/msiu', $string))
            {
                return true;
            }

            return false;
        }

        public static function checkEmeil($email)
        {
            if(trim($email) == '')
            {
                return 'Введите e-mail';
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                return 'Введите e-mail правильно';
            }

            return false;
        }

        public static function checkPhone($phone)
        {
            if(trim($phone) == '')
            {
                return 'Введите номер';
            }
            elseif(!preg_match('~^[8][0-9]{10}$~', $phone))
            {
                return 'Введите номер в правильном формате';
            }

            return false;
        }

        public static function checkPassportSeries($passportSeries)
        {
            if(preg_match('~^[0-9]{4}$~', $passportSeries))
            {
                return true;
            }

            return false;
        }

        public static function checkPassportNumber($passportNumber)
        {
            if(preg_match('~^[0-9]{6}$~', $passportNumber))
            {
                return true;
            }

            return false;
        }

        public static function checkBirthDate($birthDate)
        {
            if(trim($birthDate) == '')
            {
                return 'Введите дату рождения';
            }
            elseif(!preg_match('~^[0-9]{2}.[0-9]{2}.[0-9]{4}$~', $birthDate))
            {
                return 'Введите дату в формате дд.мм.гг';
            }
            elseif(strtotime($birthDate) == -1)
            {
                return 'Введите дату правильно';
            }

            return false;
        }
    }

?>