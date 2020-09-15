<?php

namespace App\Contracts\Category;

use App\Contracts\MainContract;

class CategoryContract extends MainContract
{
    const TABLE         =   'categories';

    const PARENT_ID     =   'parent_id';
    const SORT          =   'sort';
    const CUSTOM_NAME   =   'custom_name';
    const NAME          =   'name';
    const ENABLED       =   'enabled';

    const FILLABLE      =   [
        self::PARENT_ID,
        self::SORT,
        self::NAME,
        self::ENABLED
    ];
}
