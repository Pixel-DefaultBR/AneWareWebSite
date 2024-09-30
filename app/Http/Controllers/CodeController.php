<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class CodeController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'coder' => 'regex:/^[A-Za-z0-9-_]/',
        ]);

        $username = User::all('name')->all();
        $token = env('GITHUB_TOKEN');
        $response = [];

        if ($request->all()) {
            $coder = $request->coder;

            foreach ($username as $key => $value) {
                $usernameArray[] = $value['name'];
            }

            if (!in_array($coder, $usernameArray)) {
                return redirect()->back()->with('error', 'Você não pode acessar este recurso.');
            }

            $request = Http::withOptions([
                'verify' => 'storage/certificate/cacert.pem',

            ])->withToken($token)->get(url('https://api.github.com/users/' . $coder . '/repos'))->json();
            $json = json_encode($request);
            $response = json_decode($json);

            return view('site.code')->with(['response' => $response, 'username' => $username]);
        }

        return view('site.code')->with(['response' => $response, 'username' => $username]);
    }

}
