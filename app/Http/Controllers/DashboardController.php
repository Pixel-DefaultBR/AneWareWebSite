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

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'numeric',
        ]);

        $report = Report::find($request->id);

        if (!$report) {
            return redirect()->back()->with('error','Relatório não encontrado.');
        }
        
        return view('app.dashboard.edit', compact('report'));
    }
}
