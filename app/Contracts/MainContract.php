<?php

namespace App\Contracts;


class MainContract extends CurlContract
{

    const ID                        =   'id';

    const CREATED_AT                =   'created_at';
    const UPDATED_AT                =   'updated_at';

    public const DEL                =   'del';
    public const DEL_DELETED        =   'deleted';
    public const DEL_ACTIVE         =   'active';
    public const DEL_BLOCKED        =   'blocked';
    public const DEL_VALUES         =   [
        self::DEL_DELETED,
        self::DEL_ACTIVE,
        self::DEL_BLOCKED
    ];
}
