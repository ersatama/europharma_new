<?php

namespace App\Models;

use App\Contracts\DeliveryMethodList\DeliveryMethodListContract;
use Illuminate\Database\Eloquent\Model;

class DeliveryMethodList extends Model
{
    protected $fillable = [
        DeliveryMethodListContract::LIST_ID,
        DeliveryMethodListContract::CITY_ID,
        DeliveryMethodListContract::MIN_PRICE,
        DeliveryMethodListContract::MAX_PRICE,
        DeliveryMethodListContract::ENABLED,
    ];
}
