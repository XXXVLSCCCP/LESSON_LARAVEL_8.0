<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(){
        dd('admin.index');

    }
    public function show($id){
        dd('admin.show');

    }
    public function add(){
        dd('admin.index');

    }
}
