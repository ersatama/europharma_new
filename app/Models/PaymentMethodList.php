<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentMethod;
use App\Contracts\PaymentMethodList\PaymentMethodListContract;
use App\Contracts\PaymentMethod\PaymentMethodContract;

class PaymentMethodList extends Model
{

    protected $fillable = [
        PaymentMethodListContract::LIST_ID,
        PaymentMethodListContract::CITY_ID,
        PaymentMethodListContract::DELIVERY_ID,
        PaymentMethodListContract::ENABLED,
    ];

    /*public function paymentMethod() {
        return $this->belongsTo(PaymentMethod::class,PaymentMethodContract::ID,PaymentMethodListContract::LIST_ID);
    }*/

}
