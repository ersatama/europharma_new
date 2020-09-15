<?php

namespace App\Contracts\City;

use App\Contracts\MainContract;

class CityContract extends MainContract
{
    const TABLE =   'cities';

    const NAME      =   'name';
    const SLUG      =   'slug';
    const LAT       =   'lat';
    const LNG       =   'lng';
    const CODE      =   'code';
    const NUMBER    =   'number';
    const ENABLED   =   'enabled';
}
