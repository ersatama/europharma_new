<?php

namespace App\Contracts\Stock;

use App\Contracts\MainContract;

class StockContract extends MainContract
{
    const TABLE         =   'stocks';

    const PRODUCT_ID    =   'product_id';
    const CITY_ID       =   'city_id';
    const PRICE         =   'price';
    const SUB_PRICE     =   'sub_price';
    const PRICE_SPECIAL =   'price_special';
    const QUANTITY      =   'quantity';
    const CHANGED_AT    =   'changed_at';
}
