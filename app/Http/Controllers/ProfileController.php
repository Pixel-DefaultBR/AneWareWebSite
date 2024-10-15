<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->
                route('site.home')->
                with('error', 'Você não tem permissão para acessar este recurso.');
        }

        $reports = Report::where('reported_for_user_id', auth()->user()->id)
            ->orderBy("created_at", "desc")
            ->simplePaginate(6);

        if (!$reports) {
            return view('site.profile.profile');
        }

        return view('site.profile.profile', compact('reports'));
    }

    public function edit(Request $request)
    {
        // Validação das imagens com mensagens customizadas
        $request->validate([
            'dashboard-image' => 'file|mimes:jpeg,jpg,png|max:4000',
            'profile-image' => 'file|mimes:jpeg,jpg,png|max:4000',
        ], [
            'dashboard-image.file' => 'Arquivo inválido.',
            'dashboard-image.max' => 'Arquivo muito grande.',
            'dashboard-image.mimes' => 'Apenas arquivos JPEG, JPG ou PNG são permitidos.',
            'profile-image.mimes' => 'Apenas arquivos JPEG, JPG ou PNG são permitidos.',
            'profile-image.file' => 'Arquivo inválido.',
            'profile-image.max' => 'Arquivo muito grande.',
        ]);

        // Obtém o usuário autenticado
        $user = User::findOrFail(auth()->id());

        // Lógica de upload de imagens
        try {
            if ($request->hasFile('dashboard-image')) {
                $file = $request->file('dashboard-image');
                $filename = $file->hashName();
                $file->store('img', 'public'); // Armazena a imagem
                $user->top_image = $filename; // Atualiza a imagem do dashboard
            } else if ($request->hasFile('profile-image')) {
                $file = $request->file('profile-image');
                $filename = $file->hashName();
                $file->store('img', 'public'); // Armazena a imagem
                $user->image = $filename; // Atualiza a imagem do perfil
            }

            // Salva o usuário com as novas imagens
            $user->save();

            return redirect()->back()->with('success', 'Imagens atualizadas com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao salvar as imagens');
        }
    }

}
