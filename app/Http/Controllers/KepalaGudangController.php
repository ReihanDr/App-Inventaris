<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepalaGudangController extends Controller
{
    public function index(){
        return view('kepalagudang.index');
    }
}
