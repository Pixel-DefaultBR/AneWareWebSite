<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class DashboardController extends Controller
{
    public function index()
    {
        $fetch = new Report();
        $reports = $fetch::all();
        return view('app.dashboard.index', compact('reports'));
    }

    public function create()
    {
        return view('app.dashboard.create');
    }

    public function edit($id)
    {
        $fetchOne = new Report();
        $report = $fetchOne::find($id);
        return view('app.dashboard.edit', compact('report')); // Ajuste para o caminho correto da view
    }
}
