<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentMethodList;
use App\Models\City;
use App\Contracts\PaymentMethod\PaymentMethodContract;
use App\Contracts\PaymentMethodList\PaymentMethodListContract;
use App\Contracts\City\CityContract;

class PaymentMethod extends Model
{

    protected $fillable = [
        PaymentMethodContract::CUSTOM_NAME,
        PaymentMethodContract::NAME,
        PaymentMethodContract::ENABLED,
    ];

    public function city() {
        return $this->hasManyThrough(
            City::class,
            PaymentMethodList::class,
            PaymentMethodListContract::CITY_ID,
            CityContract::ID,
            PaymentMethodContract::ID,
            PaymentMethodListContract::LIST_ID
        );
    }

}
