<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Contracts\Category\CategoryContract;

class Category extends Model
{
    protected $fillable = CategoryContract::FILLABLE;


}
