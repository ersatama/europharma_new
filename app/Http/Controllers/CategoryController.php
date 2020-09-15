<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Category\CategoryContract;
use App\Repositories\Category\CategoryRepositoryEloquent;

class CategoryController extends Controller
{

    private $category;

    public function __construct()
    {
        $this->category =  new CategoryRepositoryEloquent;
    }

    public function get()
    {
        return $this->category->get();
    }

    public function update() {
        return $this->category->update();
    }

    public function getById($id) {
        return $this->category->getById($id);
    }

}
