<?php

namespace App\Repositories\Category;

use App\Contracts\Category\CategoryContract;
use App\Models\Category;

class CategoryRepositoryEloquent implements CategoryRepositoryInterface
{

    protected $url      =   'https://api.europharma.kz/app/categories';
    protected $token    =   'Authorization: Bearer qM2O_423vAQhoTDYbnNnsRl8tVCigBnP';

    public function getById($id) {
        return Category::where(CategoryContract::ID,$id)->first();
    }

    public function get() {
        return Category::all();
    }

    public function update() {
        Category::truncate();
        $ch    =   curl_init();
        curl_setopt($ch,CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            CategoryContract::CONTENT_JSON,$this->token
        ]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $body = json_decode(curl_exec($ch),TRUE);
        curl_close($ch);
        if (array_key_exists('items',$body)) {
            foreach ($body['items'] as &$value) {
                Category::create([
                    CategoryContract::ID            =>  $value['id'],
                    CategoryContract::PARENT_ID     =>  $value['parent_id'],
                    CategoryContract::SORT          =>  $value['sort'],
                    CategoryContract::CUSTOM_NAME   =>  $value['name'],
                    CategoryContract::NAME          =>  $value['name'],
                    CategoryContract::ENABLED       =>  $value['enabled']
                ]);
            }
        }
    }

}
