<?php

namespace App\Contracts\DeliveryMethodList;

use App\Contracts\MainContract;

class DeliveryMethodListContract extends MainContract
{
    const TABLE         =   'delivery_method_lists';

    const LIST_ID       =   'list_id';
    const CITY_ID       =   'city_id';
    const MIN_PRICE     =   'min_price';
    const MAX_PRICE     =   'max_price';
    const ENABLED       =   'enabled';
}
