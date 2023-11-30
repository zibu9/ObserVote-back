<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function createCandidat()
    {
        $types = Type::all();

        return view('superadmin.candidat', compact('types'));
    }

    public function storeCandidat(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'parti' => 'required|string',
            'candidat' => 'required|string',
            'sexe' => 'required|string',
            'province' => 'required|string',
            'circonscription' => 'required|string',
            'email' => 'required|email|unique:candidats,email',
            'phone' => 'required|string|unique:candidats,phone',
            'password' => 'required|string|min:8',
        ]);
        $password = $request->input('password');
        $candidat = Candidat::create([
            'name' => $request->input('name'),
            'regroupement' => $request->input('regroupement'),
            'parti' => $request->input('parti'),
            'candidat' => $request->input('candidat'),
            'sexe' => $request->input('sexe'),
            'province' => $request->input('province'),
            'circonscription' => $request->input('circonscription'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => $password,
        ]);

        $candidat->update([
            'password' => Hash::make($password),
        ]);

        return redirect()->route('candidats.index')->with('success', 'Candidat créé avec succès');
    }

}
