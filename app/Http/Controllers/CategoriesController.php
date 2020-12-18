<?php

namespace App\Http\Controllers;

use App\models\Category;
use Illuminate\Http\Request;
use App\Library\Calc;

class CategoriesController extends Controller
{
    public function index(){



        $category=Category::getCategories();




       return view('News.index',['news' => $category]);


    }

    public function calc(){


        $calc = New Calc();


        $result = $calc->add(4)->$calc->sub(4)->$calc->add(4)->$calc->sub(4)->getResult();

        dd($result);


    }

}




