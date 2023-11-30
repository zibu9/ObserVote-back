<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index(){
        $candidats = Candidat::all();
        return view('superadmin.index', compact('candidats'));
    }

    public function edit($id)
    {
        $candidat = Candidat::findOrFail($id);
        $types = Type::all();
        return view('superadmin.edit-candidat', compact('candidat', 'types'));
    }

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
            'type_id' => (int) $request->input('type_id'),
        ]);

        $candidat->update([
            'password' => Hash::make($password),
        ]);

        return redirect()->route('candidat.index')->with('success', 'Candidat créé avec succès');
    }

}
