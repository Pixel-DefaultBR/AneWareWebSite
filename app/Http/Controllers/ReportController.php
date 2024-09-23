<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $report = ['test', '123'];
        return view('site.report', compact('report'));
    }

    public function getById(int $id)
    {
        print_r($id);
    }
}
