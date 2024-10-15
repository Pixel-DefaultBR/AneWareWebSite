<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy("created_at", "desc")->simplePaginate(6);
        return view('site.report.index', compact('reports'));
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->merge(['reported_for_user_id' => auth()->user()->id]);

            $data = $request->all();

            Report::create($data);

            return redirect()->route('site.profile.profile')->with('success', 'Relatorio criado como sucesso.');
        }

        return view('site.report.store');
    }

    public function destroy(Request $request)
    {
        $report = Report::where('id', $request->id)->firstOrFail();

        if (!auth()->check()) {
            return redirect()->route('auth.index')->with('error', 'Faca login para realizar esta operacao');
        }

        if ($report->reported_for_user_id != auth()->user()->id) {
            return redirect()->route('')->with('error', 'Voce nao tem permissao para acessar este recurso.');
        }

        $report->delete();
        return redirect()->back()->with('success', 'Relatorio deletado com sucesso');
    }

}
