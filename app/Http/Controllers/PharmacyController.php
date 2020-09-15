<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Pharmacy\PharmacyRepositoryEloquent;

class PharmacyController extends Controller
{
    private $pharmacy;

    public function __construct() {
        $this->pharmacy =   new PharmacyRepositoryEloquent;
    }

    public function get()
    {
        return $this->pharmacy->get();
    }

    public function update()
    {
        return $this->pharmacy->update();
    }

    public function getById($id)
    {
        return $this->pharmacy->getById($id);
    }
}
