<?php

namespace App\Repositories\Stock;

use App\Models\Stock;
use App\Contracts\Stock\StockContract;

class StockRepositoryEloquent implements StockRepositoryInterface
{
    protected $token        =   'Authorization: Bearer qM2O_423vAQhoTDYbnNnsRl8tVCigBnP';
    protected $url          =   'https://api.europharma.kz/app/stocks?p=';
    protected $urlStocks    =   'https://api.europharma.kz/app/stocks?changed=1593338871';
    protected $skip         =   0;
    protected $take         =   100;

    public function getById($id) {
        return Stock::where(StockContract::ID,$id)->first();
    }

    public function getByProductId($id) {
        return Stock::where(StockContract::PRODUCT_ID,$id)->get();
    }

    public function get($request) {
        if (array_key_exists('take',$request)) {
            $this->take =   $request['take'];
        }
        if (array_key_exists('page',$request)) {
            $this->skip =   ($request['page']-1) * $this->take;
        }

        return Stock::skip($this->skip)
            ->take($this->take)
            ->orderBy(StockContract::ID,'desc')
            ->get();

    }

    public function update($page = 1) {
        if ($page == 1) {
            Stock::truncate();
        }
        $ch    =   curl_init();
        curl_setopt($ch,CURLOPT_URL,$this->url.$page);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            StockContract::CONTENT_JSON,$this->token
        ]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $body = json_decode(curl_exec($ch),TRUE);
        curl_close($ch);
        if (array_key_exists('items',$body)) {
            foreach ($body['items'] as &$value) {
                Stock::create([
                    StockContract::PRODUCT_ID       =>  $value['product_id'],
                    StockContract::CITY_ID          =>  $value['city_id'],
                    StockContract::PRICE            =>  $value['price'],
                    StockContract::SUB_PRICE        =>  $value['sub_price'],
                    StockContract::PRICE_SPECIAL    =>  $value['price_special'],
                    StockContract::QUANTITY         =>  $value['quantity'],
                    StockContract::CHANGED_AT       =>  $value['changed_at'],
                ]);
            }
            if ($page < $body['pageCount']) {
                $this->update(++$page);
            }
        }
    }

}
