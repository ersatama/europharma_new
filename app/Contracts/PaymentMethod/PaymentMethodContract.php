<?php

namespace App\Contracts\PaymentMethod;

use App\Contracts\MainContract;

class PaymentMethodContract extends MainContract
{

    const TABLE         =   'payment_methods';

    const CUSTOM_NAME   =   'custom_name';
    const NAME          =   'name';
    const ENABLED       =   'enabled';
}
