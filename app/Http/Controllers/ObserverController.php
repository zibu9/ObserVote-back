<?php

namespace App\Http\Controllers;

use App\Models\Observer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ObserverController extends Controller
{
    public function index()
    {
        $observer = Observer::where('email', Auth::user()->email)
                        ->orWhere('phone', Auth::user()->phone)
                        ->first();
        $results = $observer->results;
        return view('observer.index', compact('results'));
    }

    public function createResult()
    {
        if (Gate::allows('observer-access')) {

            return view('observer.resultat');
        } else {
            abort(403);
        }

    }
}
