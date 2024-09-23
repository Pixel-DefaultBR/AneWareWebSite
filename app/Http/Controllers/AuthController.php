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

    public function login(Request $request)
    {
        $request->validate(['email' => 'required|email', 'password' => 'required']);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email ou senha invalido.');
        }

        if (!password_verify($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Email ou senha invalido.');
        }

        Auth::loginUsingId($user->id);
        if (Auth::check()) {
            return redirect()->route('app.dashboard.index')->with('Voce esta logado!');
        }

        return view('app.auth.index');

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('site.home')->with('You have signed-in');
    }
    public function register(Request $request)
    {
        $request->validate(['name' => 'required', 'email' => 'required|email', 'password' => 'required']);
        $data = $request->all();
        $check = User::create($data);
        return redirect()->route('site.home')->with('You have signed-in');
    }
}
