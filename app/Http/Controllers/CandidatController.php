<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Observer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class CandidatController extends Controller
{
    public function index(){
        $observers = Observer::all();
        return view('admin.index', compact('observers'));
    }

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
        $observer = Observer::create([
            'name' => $request->input('name'),
            'sexe' => $request->input('sexe'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => $password,
            'candidat_id' => (int) Auth::user()->candidat->id,
        ]);

        $observer->update([
            'password' => Hash::make($password),
        ]);

        return redirect()->route('observer.index')->with('success', 'Temoins créé avec succès');
    }

    public function edit($id)
    {
        $observer = Observer::findOrFail($id);
        return view('admin.edit-observer', compact('observer'));
    }

    public function show($id)
    {
        $observer = Observer::findOrFail($id);
        return view('admin.show', compact('observer'));
    }

    public function updateObserver(Request $request, $id)
    {
        $observer = Observer::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:45',
            'sexe' => 'required',
        ]);

        $observer->update($validatedData);

        return redirect()->route('observer.index')->with('success', 'Temoins mis à jour avec succès !');
    }

    public function results()
    {
        $candidat = Candidat::where('email', Auth::user()->email)
                ->orWhere('phone', Auth::user()->phone)
                ->first();
        $results = $candidat->results;

        return view('admin.result', compact('results'));
    }
}
