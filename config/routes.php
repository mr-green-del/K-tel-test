<?php

    return array
    (
        ''                               => 'user/login',
        'logout'                         => 'user/logout',

        'cabinet'                        => 'cabinet/index',
        'cabinet/client'                 => 'cabinetClient/index',
        'cabinet/client/page-([0-9]+)'   => 'cabinetClient/index/$1',
        'cabinet/client/create'          => 'cabinetClient/create',
        'cabinet/client/update/([0-9]+)' => 'cabinetClient/update/$1',
        'cabinet/client/view/([0-9]+)'   => 'cabinetClient/view/$1',
    )


?>