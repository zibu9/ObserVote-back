<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Models\Observer;

class CandidatController extends Controller
{
    public function createObserver()
    {
        if (Gate::allows('admin-access')) {

            return view('admin.observer');
        } else {
            abort(403);
        }

    }

    public function storeObserver(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'sexe' => 'required|string',
            'email' => 'required|email|unique:candidats,email',
            'phone' => 'required|string|unique:candidats,phone',
            'password' => 'required|string|min:8',
        ]);
        $password = $request->input('password');
        $observer = Observer::create([
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

        $observer->update([
            'password' => Hash::make($password),
        ]);

        return redirect()->route('candidat.index')->with('success', 'Candidat créé avec succès');
    }
}
