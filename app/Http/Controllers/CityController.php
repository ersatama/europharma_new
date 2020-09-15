<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\City\CityRepositoryEloquent;

class CityController extends Controller
{

    private $city;

    public function __construct()
    {
        $this->city =   new CityRepositoryEloquent;
    }

    public function get()
    {
        return $this->city->get();
    }

    public function update()
    {
        return $this->city->update();
    }

    public function getById($id)
    {
        return $this->city->getById($id);
    }
}
