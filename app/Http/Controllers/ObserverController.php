<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ObserverController extends Controller
{
    public function createResult()
    {
        if (Gate::allows('observer-access')) {

            return view('observer.resultat');
        } else {
            abort(403);
        }

    }
}
