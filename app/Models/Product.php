<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Contracts\Product\ProductContract;
use App\Contracts\Category\CategoryContract;
use App\Models\Category;

class Product extends Model
{
    protected $fillable = [
        ProductContract::ITEM_ID,
        ProductContract::CATEGORY_ID,
        ProductContract::CUSTOM_NAME,
        ProductContract::NAME,
        ProductContract::SKU,
        ProductContract::BRAND,
        ProductContract::RECIPE,
        ProductContract::SPECIAL,
        ProductContract::ENABLED,
    ];

    public function category() {
        return $this->hasOne(Category::class,CategoryContract::ID,ProductContract::CATEGORY_ID);
    }
}
