<?php

namespace App\Models;

use App\Contracts\Pharmacy\PharmacyContract;
use App\Models\City;
use App\Contracts\City\CityContract;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $fillable = [
        PharmacyContract::ID,
        PharmacyContract::NUMBER,
        PharmacyContract::CITY_ID,
        PharmacyContract::CUSTOM_NAME,
        PharmacyContract::NAME,
        PharmacyContract::ADDRESS,
        PharmacyContract::WORKING_TIME,
        PharmacyContract::LAT,
        PharmacyContract::LNG,
        PharmacyContract::ENABLED,
    ];

    public function city() {
        return $this->hasOne(City::class,CityContract::ID,PharmacyContract::CITY_ID);
    }
}
