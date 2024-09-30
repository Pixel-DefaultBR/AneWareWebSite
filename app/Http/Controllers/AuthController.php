<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('app.auth.index');
    }

    public function start()
    {
        return view('app.auth.start');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate(['email' => 'required|email', 'password' => 'required']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('app.dashboard.index')->with('success', 'Bem vindo!');
        }

        return redirect()->back()->with('error', 'E-mail e/ou senha inválidos.');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('site.home')->with('success', 'Ate logo!');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'confirmPassword' => 'required'
        ], [
            'name.required' => 'Campo nome é obrigatório.',
            'email.unique' => 'E-mail já cadastrado.',
            'email.required',
            'Campo E-mail é obrigatório',
            'email.email' => 'E-mail inválido.',
            'password.min' => 'Senha muito curta.'
        ]);

        if ($request->password !== $request->confirmPassword) {
            return redirect()->back()->with('error', 'Senhas diferentes.');
        }

        $data = $request->all();
        $user = User::create($data);

        Auth::loginUsingId($user->id);

        return redirect()->route('site.home')->with('success', 'You have signed-in');
    }

    public static function checkAuth()
    {
        if (!auth()->check()) {
            return redirect()->route('site.home')->with('error', 'Você precisa estar autenticado para realizar esta ação.');
        }

        return null;
    }
}
