<?php

namespace App\Models;

use App\Contracts\City\CityContract;
use App\Contracts\DeliveryMethod\DeliveryMethodContract;
use App\Contracts\DeliveryMethodList\DeliveryMethodListContract;
use Illuminate\Database\Eloquent\Model;

class DeliveryMethod extends Model
{
    protected $fillable = [
        DeliveryMethodContract::CUSTOM_NAME,
        DeliveryMethodContract::NAME,
        DeliveryMethodContract::ENABLED,
    ];

    public function city() {
        return $this->hasManyThrough(
            City::class,
            DeliveryMethodList::class,
            DeliveryMethodListContract::CITY_ID,
            CityContract::ID,
            DeliveryMethodContract::ID,
            DeliveryMethodListContract::LIST_ID
        );
    }
}
