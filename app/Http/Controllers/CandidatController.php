<?php

namespace App\Http\Controllers;

use App\Models\Observer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'email|unique:observers,email',
            'phone' => 'required|string|unique:observers,phone',
            'password' => 'required|string|min:8',
        ]);
        $password = $request->input('password');
        $candidat = Observer::create([
            'name' => $request->input('name'),
            'sexe' => $request->input('sexe'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => $password,
            'candidat_id' => (int) Auth::user()->candidat->id,
        ]);

        $candidat->update([
            'password' => Hash::make($password),
        ]);

        return redirect()->route('candidat.index')->with('success', 'Candidat créé avec succès');
    }
}
