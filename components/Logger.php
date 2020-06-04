<?php

    class Logger
    {
        const PATH_TO_LOG = ROOT. '/logs/user_log.log';

        public static function newLogRecord($recordText)
        {
            $data = '['.date('d.m.Y H:i:s').'] '. $recordText. "\n";
            file_put_contents(self::PATH_TO_LOG, $data, FILE_APPEND);
        }
    }


?>