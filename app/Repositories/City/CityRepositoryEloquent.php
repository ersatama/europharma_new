<?php

namespace App\Repositories\City;

use App\Models\City;
use App\Contracts\City\CityContract;

class CityRepositoryEloquent implements CityRepositoryInterface
{

    protected $url      =   'https://api.europharma.kz/app/cities';
    protected $token    =   'Authorization: Bearer qM2O_423vAQhoTDYbnNnsRl8tVCigBnP';

    public function getById($id) {
        return City::where(CityContract::ID,$id)->first();
    }

    public function get() {
        return City::all();
    }

    public function update() {
        City::truncate();
        $ch    =   curl_init();
        curl_setopt($ch,CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            CityContract::CONTENT_JSON,$this->token
        ]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $body = json_decode(curl_exec($ch),TRUE);
        curl_close($ch);
        if (array_key_exists('items',$body)) {
            foreach ($body['items'] as &$value) {
                City::create([
                    CityContract::ID        =>  $value['id'],
                    CityContract::NAME      =>  $value['name'],
                    CityContract::SLUG      =>  $value['slug'],
                    CityContract::LAT       =>  $value['lat'],
                    CityContract::LNG       =>  $value['lng'],
                    CityContract::CODE      =>  $value['phone']['code'],
                    CityContract::NUMBER    =>  $value['phone']['number'],
                    CityContract::ENABLED   =>  $value['enabled']
                ]);
            }
        }
    }

}
