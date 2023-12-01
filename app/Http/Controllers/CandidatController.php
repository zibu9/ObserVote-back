<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
}
