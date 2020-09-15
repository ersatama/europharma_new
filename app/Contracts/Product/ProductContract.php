<?php

namespace App\Contracts\Product;

use App\Contracts\MainContract;

class ProductContract extends MainContract
{
    const TABLE         =   'products';

    const ITEM_ID       =   'item_id';
    const CATEGORY_ID   =   'category_id';
    const CUSTOM_NAME   =   'custom_name';
    const NAME          =   'name';
    const SKU           =   'sku';
    const BRAND         =   'brand';
    const RECIPE        =   'recipe';
    const SPECIAL       =   'special';
    const ENABLED       =   'enabled';
}
