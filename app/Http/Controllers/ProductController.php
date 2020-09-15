<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryEloquent;

class ProductController extends Controller
{
    private $product;

    public function __construct() {
        $this->product  =   new ProductRepositoryEloquent;
    }

    public function get()
    {
        return $this->product->get();
    }

    public function update()
    {
        return $this->product->update();
    }

    public function getById($id)
    {
        return $this->product->getById($id);
    }

    public function getByCategoryId($id) {
        return $this->product->getByCategoryId($id);
    }

    public function getBySku($id) {
        return $this->product->getBySku($id);
    }

}
