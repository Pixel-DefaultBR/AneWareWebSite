<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($username)
    {
        $user = User::where("name", $username)->first();
        if ($user) {
            return view('app.index', compact('user'));
        }

        return redirect()->route('app.index', $username);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);

        if ($user && $user->email === $request->email) {
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
