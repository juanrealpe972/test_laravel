<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function uploadPhoto(Request $request)
    {
        $request->validate(['photo' => 'required']); // Se valida que el campo de la foto sea requerido.
        $request->file('photo')->store('profiles');
        return redirect('profile')->with('status', 'Photo uploaded!');
    }
}
