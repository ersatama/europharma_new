<?php

namespace App\Contracts\User;

use App\Contracts\MainContract;

class UserContract extends MainContract
{

    const TABLE                         =   'users';

    const STATUS                        =   'status';
    const USER                          =   'user';
    const ADMIN                         =   'admin';
    const SUPER_ADMIN                   =   'super_admin';
    const STATUS_VALUES                 =   [
        self::USER,
        self::ADMIN,
        self::SUPER_ADMIN
    ];

    const NAME                          =   'name';

    const GENDER                        =   'gender';
    const EMPTY                         =   'empty';
    const MALE                          =   'male';
    const FEMALE                        =   'female';
    const GENDER_VALUES                 =   [
        self::EMPTY,
        self::MALE,
        self::FEMALE
    ];

    const BIRTHDATE                     =   'birthdate';
    const PHONE                         =   'phone';
    const PHONE_VERIFIED_AT             =   'phone_verified_at';
    const PHONE_CODE                    =   'phone_code';

    const EMAIL                         =   'email';
    const EMAIL_VERIFIED_AT             =   'email_verified_at';

    const PASSWORD                      =   'password';
    const REMEMBER_TOKEN                =   'remember_token';

    //DEFAULT VALUES
    const EMAIL_NOTIFICATION            =   'email_notification';
    const PUSH_NOTIFICATION             =   'push_notification';
    const ENABLED                       =   'enabled';
    const DISABLED                      =   'disabled';
    const EMAIL_NOTIFICATION_VALUES     =   [
        self::ENABLED,
        self::DISABLED
    ];
    const PHONE_NOTIFICATION_VALUES     =   [
        self::ENABLED,
        self::DISABLED
    ];

}
