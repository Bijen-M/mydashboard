<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        $data['name']= 'Contact-Us';
        $data['slug']= 'contact-us';
        $data['status']= '1';
        Category::create($data);
    }
}
