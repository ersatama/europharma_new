<?php

namespace App\Contracts\PaymentMethodList;

use App\Contracts\MainContract;


class PaymentMethodListContract extends MainContract
{
    const TABLE         =   'payment_method_lists';

    const LIST_ID       =   'list_id';
    const CITY_ID       =   'city_id';
    const DELIVERY_ID   =   'delivery_id';
    const ENABLED       =   'enabled';
}
