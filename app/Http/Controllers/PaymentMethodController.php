<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PaymentMethod\PaymentMethodRepositoryEloquent;

class PaymentMethodController extends Controller
{

    protected $paymentMethod;

    public function __construct() {
        $this->paymentMethod = new PaymentMethodRepositoryEloquent;
    }

    public function getById($id) {
        return $this->paymentMethod->getById($id);
    }

    public function get() {
        return $this->paymentMethod->get();
    }

    public function update() {
        return $this->paymentMethod->update();
    }

}
