<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Stock\StockRepositoryEloquent;

class StockController extends Controller
{
    private $stock;

    public function __construct() {
        $this->stock = new StockRepositoryEloquent;
    }

    public function get(Request $request) {
        return $this->stock->get($request->all());
    }

    public function update() {
        return $this->stock->update();
    }

    public function getById($id) {
        return $this->stock->getById($id);
    }

    public function getByProductId($id) {
        return $this->stock->getByProductId($id);
    }

}
