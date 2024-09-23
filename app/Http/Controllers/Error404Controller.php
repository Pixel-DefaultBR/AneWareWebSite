<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Error404Controller extends Controller
{
    public function index()
    {
        echo "Erro 404 <a href='" . route('site.home') . "'>Return</a>";
    }
}
