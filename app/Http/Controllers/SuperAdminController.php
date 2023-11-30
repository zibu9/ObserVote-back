<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function createCandidat()
    {
        $types = Type::all();

        return view('superadmin.candidat', compact('types'));
    }
}
