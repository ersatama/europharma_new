<?php

namespace App\Models;

use App\Contracts\Stock\StockContract;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        StockContract::PRODUCT_ID,
        StockContract::CITY_ID,
        StockContract::PRICE,
        StockContract::SUB_PRICE,
        StockContract::PRICE_SPECIAL,
        StockContract::QUANTITY,
        StockContract::CHANGED_AT,
    ];
}
