<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index()
    {

        $reports = Report::all();

        return view('site.report', compact('reports'));
    }

    public function store(Request $request)
    {
        $this->handleInputValidadte($request);

        $report = new Report();
        $report->client = $request->client;
        $report->researcher = $request->researcher;
        $report->title = $request->title;
        $report->description = $request->description;
        $report->vulnerability_type = $request->vulnerability_type;
        $report->severity = $request->severity;
        $report->status = $request->status;
        $report->user_id = auth()->user()->id;

        $uploadImage = $this->handleImageUpload($request);

        $report->image = $uploadImage;

        $report->save();

        return redirect()->route('site.report.index')->with('success', 'Relatorio criado com sucesso!');
    }


    public function update(Request $request)
    {
        $this->handleInputValidadte($request);

        $report = Report::findOrFail($request->id);

        if ($report->user_id !== auth()->user()->id) {
            return redirect()->route('app.dashboard.index')->with('error', 'Você não tem permissão para editar este relatório.');
        }

        $report->update($request->only([
            'client',
            'researcher',
            'title',
            'description',
            'vulnerability_type',
            'severity',
            'status'
        ]));

        if ($request->hasFile('image')) {
            $uploadImage = $this->handleImageUpload($request);
            $report->image = $uploadImage;
            $report->save();
        }

        return redirect()->route('app.dashboard.index')->with('success', 'Relatório atualizado com sucesso!');
    }
    public function destroy(Request $request)
    {
        try {
            $report = Report::where('id', $request->id)->firstOrFail();
            
            if ($report->user_id !== auth()->user()->id) {
                return redirect()->route('app.dashboard.index')->with('error', 'Você não tem permissão para deletar este relatório.');
            }

            $report->delete();
            return redirect()->route('app.dashboard.index')->with('success', 'Relatorio deletado com sucesso!');
        } catch (\Exception $error) {

        }

    }

    // Handles
    private function handleImageUpload(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();

            $file->store('img', 'public');
            return $filename;
        }

        return null;
    }
    private function handleInputValidadte(Request $request)
    {
        $request->validate([
            'client' => 'required',
            'researcher' => 'required',
            'title' => 'required',
            'description' => 'required',
            'vulnerability_type' => 'required',
            'severity' => 'required',
            'status' => 'required',
            'image' => 'bail|image|mimes:jpeg,jpg,png|max:2048'
        ]);
    }
}
