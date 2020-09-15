<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Contracts\Product\ProductContract;

class ProductRepositoryEloquent implements ProductRepositoryInterface
{
    protected $url          =   'https://api.europharma.kz/app/products';
    protected $urlProducts  =   'https://api.europharma.kz/app/products?changed=1593338871';
    protected $urlPage      =   'https://api.europharma.kz/app/products?p=';
    protected $token        =   'Authorization: Bearer qM2O_423vAQhoTDYbnNnsRl8tVCigBnP';

    public function getById($id) {
        return Product::with('category')->where(ProductContract::ID,$id)->first();
    }

    public function getByCategoryId($id) {
        return Product::with('category')->where(ProductContract::CATEGORY_ID,$id)->get();
    }

    public function getBySku($id) {
        return Product::with('category')->where(ProductContract::SKU,$id)->get();
    }

    public function get() {
        return Product::with('category')->get();
    }

    public function update($page = 1) {
        if ($page == 1) {
            Product::truncate();
        }
        $ch    =   curl_init();
        curl_setopt($ch,CURLOPT_URL,$this->urlPage.$page);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            ProductContract::CONTENT_JSON,$this->token
        ]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $body = json_decode(curl_exec($ch),TRUE);
        curl_close($ch);
        if (array_key_exists('items',$body)) {
            foreach ($body['items'] as &$value) {
                Product::create([
                    ProductContract::ITEM_ID        =>  $value['id'],
                    ProductContract::CATEGORY_ID    =>  $value['category_id'],
                    ProductContract::CUSTOM_NAME    =>  $value['name'],
                    ProductContract::NAME           =>  $value['name'],
                    ProductContract::SKU            =>  $value['sku'],
                    ProductContract::BRAND          =>  $value['brand'],
                    ProductContract::RECIPE         =>  $value['recipe'],
                    ProductContract::SPECIAL        =>  $value['special'],
                    ProductContract::ENABLED        =>  $value['status']['id']
                ]);
            }
            if ($page < $body['pageCount']) {
                $this->update(++$page);
            }
        }
    }

}
