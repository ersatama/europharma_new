<?php

namespace App\Repositories\DeliveryMethod;

use App\Models\DeliveryMethod;
use App\Models\DeliveryMethodList;
use App\Contracts\DeliveryMethod\DeliveryMethodContract;
use App\Contracts\DeliveryMethodList\DeliveryMethodListContract;


class DeliveryMethodRepositoryEloquent implements DeliveryMethodRepositoryInterface
{

    protected $url      =   'https://api.europharma.kz/app/delivery-methods';
    protected $token    =   'Authorization: Bearer qM2O_423vAQhoTDYbnNnsRl8tVCigBnP';

    public function getById($id) {
        return DeliveryMethod::with('city')->where(DeliveryMethodContract::ID,$id)->get();
    }

    public function get() {
        return DeliveryMethod::with('city')->get();
    }

    public function update() {
        DeliveryMethod::truncate();
        DeliveryMethodList::truncate();
        $ch    =   curl_init();
        curl_setopt($ch,CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            DeliveryMethodContract::CONTENT_JSON,$this->token
        ]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $body = json_decode(curl_exec($ch),TRUE);
        curl_close($ch);
        if (array_key_exists('items',$body)) {
            foreach ($body['items'] as &$value) {
                print_r($value);
                DeliveryMethod::create([
                    DeliveryMethodContract::ID           =>  $value['id'],
                    DeliveryMethodContract::CUSTOM_NAME  =>  $value['name'],
                    DeliveryMethodContract::NAME         =>  $value['name'],
                    DeliveryMethodContract::ENABLED      =>  $value['enabled']
                ]);
                foreach ($value['cities'] as &$city) {
                    DeliveryMethodList::create([
                        DeliveryMethodListContract::LIST_ID     =>  $value['id'],
                        DeliveryMethodListContract::CITY_ID     =>  $city['city_id'],
                        DeliveryMethodListContract::MIN_PRICE   =>  $city['min_price'],
                        DeliveryMethodListContract::MAX_PRICE   =>  $city['max_price'],
                        DeliveryMethodListContract::ENABLED     =>  $city['enabled']
                    ]);
                }
            }
        }
    }

}
