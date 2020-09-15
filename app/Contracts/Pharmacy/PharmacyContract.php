<?php

namespace App\Contracts\Pharmacy;

use App\Contracts\MainContract;

class PharmacyContract extends MainContract
{
    const TABLE         =   'pharmacies';

    const NUMBER        =   'number';
    const CITY_ID       =   'city_id';
    const CUSTOM_NAME   =   'custom_name';
    const NAME          =   'name';
    const ADDRESS       =   'address';
    const WORKING_TIME  =   'working_time';
    const LAT           =   'lat';
    const LNG           =   'lng';
    const ENABLED       =   'enabled';
}
