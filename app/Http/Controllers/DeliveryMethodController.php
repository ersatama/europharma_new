<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DeliveryMethod\DeliveryMethodRepositoryEloquent;

class DeliveryMethodController extends Controller
{

    protected $deliveryMethod;

    public function __construct() {
        $this->deliveryMethod = new DeliveryMethodRepositoryEloquent;
    }

    public function getById($id) {
        return $this->deliveryMethod->getById($id);
    }

    public function get() {
        return $this->deliveryMethod->get();
    }

    public function update() {
        return $this->deliveryMethod->update();
    }
}
