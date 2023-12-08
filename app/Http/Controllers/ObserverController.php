<?php

namespace App\Http\Controllers;

use App\Models\Observer;
use App\Models\Province;
use App\Models\Circonscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ObserverController extends Controller
{
    public function index()
    {
        $observer = Observer::where('email', Auth::user()->email)
                        ->orWhere('phone', Auth::user()->phone)
                        ->first();
        $results = $observer->results()->paginate(10);
        $provinces = Province::all();
        $circonscriptions = Circonscription::all();
        return view('observer.index', compact('results', 'provinces', 'circonscriptions'));
    }

    public function createResult()
    {
        if (Gate::allows('observer-access')) {
            $provinces = Province::all();
            $circonscriptions = Circonscription::all();
            return view('observer.resultat', compact('provinces', 'circonscriptions'));
        } else {
            abort(403);
        }

    }
}
