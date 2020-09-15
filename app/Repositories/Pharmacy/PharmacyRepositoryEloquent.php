<?php

namespace App\Repositories\Pharmacy;

use App\Models\Pharmacy;
use App\Contracts\Pharmacy\PharmacyContract;

class PharmacyRepositoryEloquent implements PharmacyRepositoryInterface
{

    protected $url          =   'https://api.europharma.kz/app/pharmacies';
    protected $urlCityId    =   'https://api.europharma.kz/app/pharmacies?city_id=1';
    protected $token        =   'Authorization: Bearer qM2O_423vAQhoTDYbnNnsRl8tVCigBnP';

    public function getById($id) {
        return Pharmacy::with('city')->where(PharmacyContract::ID,$id)->first();
    }

    public function get() {
        return Pharmacy::with('city')->get();
    }

    public function update() {
        Pharmacy::truncate();
        $ch    =   curl_init();
        curl_setopt($ch,CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            PharmacyContract::CONTENT_JSON,$this->token
        ]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $body = json_decode(curl_exec($ch),TRUE);
        curl_close($ch);
        if (array_key_exists('items',$body)) {
            foreach ($body['items'] as &$value) {
                Pharmacy::create([
                    PharmacyContract::ID            =>  $value['id'],
                    PharmacyContract::CITY_ID       =>  $value['city_id'],
                    PharmacyContract::NUMBER        =>  $value['number'],
                    PharmacyContract::CUSTOM_NAME   =>  $value['name'],
                    PharmacyContract::NAME          =>  $value['name'],
                    PharmacyContract::ADDRESS       =>  $value['address'],
                    PharmacyContract::WORKING_TIME  =>  $value['working_time'],
                    PharmacyContract::LAT           =>  $value['lat'],
                    PharmacyContract::LNG           =>  $value['lng'],
                    PharmacyContract::ENABLED       =>  $value['enabled']
                ]);
            }
        }
    }

}
