<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    function get_categories()
    {
        $categories = scandir('C:\xampp\htdocs\FlexBooks\assets\Library');
        array_shift($categories);
        array_shift($categories);
        return $categories;
    }

    public function show($category)
    {
        if (array_search($category,$this->get_categories(),true)>=0)
        return view("page")->with("category", $category);
        else return view("error");
    }
}
