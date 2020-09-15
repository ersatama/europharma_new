<?php

namespace App\Repositories\PaymentMethod;

use App\Models\PaymentMethod;
use App\Models\PaymentMethodList;
use App\Contracts\PaymentMethod\PaymentMethodContract;
use App\Contracts\PaymentMethodList\PaymentMethodListContract;

class PaymentMethodRepositoryEloquent implements PaymentMethodRepositoryInterface
{

    protected $token    =   'Authorization: Bearer qM2O_423vAQhoTDYbnNnsRl8tVCigBnP';
    protected $url      =   'https://api.europharma.kz/app/payment-methods';

    public function get() {
        return PaymentMethod::with('city')->get();
    }

    public function getById($id) {
        return PaymentMethod::with('city')->where(PaymentMethodContract::ID,$id)->first();
    }

    public function update() {
        PaymentMethod::truncate();
        PaymentMethodList::truncate();
        $ch    =   curl_init();
        curl_setopt($ch,CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            PaymentMethodContract::CONTENT_JSON,$this->token
        ]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $body = json_decode(curl_exec($ch),TRUE);
        curl_close($ch);
        if (array_key_exists('items',$body)) {
            foreach ($body['items'] as &$value) {
                PaymentMethod::create([
                    PaymentMethodContract::ID           =>  $value['id'],
                    PaymentMethodContract::CUSTOM_NAME  =>  $value['name'],
                    PaymentMethodContract::NAME         =>  $value['name'],
                    PaymentMethodContract::ENABLED      =>  $value['enabled']
                ]);
                foreach ($value['cities'] as &$city) {
                    PaymentMethodList::create([
                        PaymentMethodListContract::LIST_ID      =>  $value['id'],
                        PaymentMethodListContract::CITY_ID      =>  $city['city_id'],
                        PaymentMethodListContract::DELIVERY_ID  =>  $city['delivery_id'],
                        PaymentMethodListContract::ENABLED      =>  $city['enabled']
                    ]);
                }
            }
        }
    }
}
