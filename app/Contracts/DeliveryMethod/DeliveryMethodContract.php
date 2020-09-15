<?php

namespace App\Contracts\DeliveryMethod;

use App\Contracts\MainContract;

class DeliveryMethodContract extends MainContract
{
    const TABLE         =   'delivery_methods';

    const CUSTOM_NAME   =   'custom_name';
    const NAME          =   'name';
    const ENABLED       =   'enabled';
}
