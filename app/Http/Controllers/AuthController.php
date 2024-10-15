<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Campo "E-mail" é obrigatório',
            'email.email' => 'Formato invalido',
            'password.required' => 'Campo de senhas obrigatório.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('site.profile.profile')->with('success', 'Bem vindo!');
        }

        return redirect()->back()->with('error', 'Erro ao efetuar login.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('site.home')->with('success', 'Volte logo!');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'confirmPassword' => 'required'
            ], [
                'email.unique' => 'E-mail já cadastrado.',
                'email.required' => 'Campo "E-mail" é obrigatório',
                'email.email' => 'E-mail inválido.',
                'password.required' => 'Campo "senha" é obrigatório',
                'password.min' => 'Senha muito curta. min:8',
                'confirmPassword.required' => 'Campo "confirme sua senha" é obrigatório.',
            ]);

            if ($request->password !== $request->confirmPassword) {
                return redirect()->back()->with('error', 'Senhas nao conferem.');
            }
            
            do {
                $generateName = $request->merge(['name' => 'AwUser#' . uniqid()]);
            } while (User::where('name', $generateName)->exists());

            $data = $request->all();
            $user = User::create($data);

            Auth::loginUsingId($user->id);

            return redirect()->route('site.profile.profile')->with('success', 'Usuario criado com sucesso.');
        }

        return view('auth.register');
    }
}
