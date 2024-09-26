<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($username)
    {
        if (preg_match('[A-Za-z0-9-_ ]', $username)) {
            return response()->view('errors.403', ['error' => 'Você não tem permissão para acessar este recurso.'], 403);
        }

        if ($username !== auth()->user()->name) {
            return response()->view('errors.403', ['error' => 'Você não tem permissão para acessar este recurso.'], 403);
        }

        $user = User::where("name", $username)->where('id', auth()->user()->id)->first();

        if (!$user) {
            return response()->view('errors.403', ['error' => 'Você não tem permissão para acessar este recurso.'], 403);
        }

        return view('app.index', compact('user'));

    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[A-Za-z0-9-_ ]+$/',
            'description',
            'github',
            'twitter',
            'instagram',
            'facebook',
        ], [
            'name.required' => 'O campo nome e obrigatorio.',
            'name.regex' => 'O campo nome contém caracteres inválidos.'
        ]);

        $user = User::find($request->id);

        if ($user && $user->id === auth()->user()->id) {
            $user->name = str_replace(' ', '-', $request->name);
            $user->update($request->only([
                'description',
                'website',
                'github',
                'twitter',
                'instagram',
                'facebook',
            ]));

            if ($request->hasFile('image')) {
                $uploadImage = $this->handleImageUpload($request);
                $user->image = $uploadImage;
                $user->save();
            }

            return redirect()->route('app.index', $user->name)->with('success', 'Dados atualizado com sucesso!');
        }
    }
    private function handleImageUpload(Request $request)
    {
        if ($redirect = AuthController::checkAuth()) {
            return $redirect;
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();

            $file->store('img', 'public');
            return $filename;
        }

        return null;
    }
    public function edit($username)
    {
        $user = User::where("name", $username)->first();
        if ($user) {
            return view('app.edit', compact('user'));
        }
    }
}
