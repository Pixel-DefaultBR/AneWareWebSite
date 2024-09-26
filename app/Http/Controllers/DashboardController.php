<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $reports = Report::all();
        return view('app.dashboard.index', compact('reports'));
    }

    public function create()
    {
        if ($redirect = AuthController::checkAuth()) {
            return $redirect;
        }

        return view('app.dashboard.create');
    }

    public function edit($id)
    {
        if ($redirect = AuthController::checkAuth()) {
            return $redirect;
        }

        $report = Report::find($id);
        return view('app.dashboard.edit', compact('report')); // Ajuste para o caminho correto da view
    }
}
