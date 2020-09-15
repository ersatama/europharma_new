<?php

namespace App\Contracts\Brand;

use App\Contracts\MainContract;

class BrandContract extends MainContract
{
    const TABLE         =   'brands';

    const CODE          =   'code';
    const CODE_LENGTH   =   2;
    const TITLE         =   'title';
    const LOGO          =   'logo';
    const ORDER         =   'order';
}
