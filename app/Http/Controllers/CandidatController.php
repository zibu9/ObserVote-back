<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Candidat;
use App\Models\Observer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class CandidatController extends Controller
{
    public function index(){
        $observers = Auth::user()->candidat->observers;
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
            'phone' => 'string|unique:observers,phone',
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
        $results = $candidat->results()->with('circonscripton')->paginate(10);

        $res = Result::where('candidat_id', $candidat->id);
        $votantInitial = $res->sum('votantInitial');
        $votant = $res->sum('votant');
        $nosVoix = $res->sum('nosVoix');
        $bulletinRestant = $res->sum('bulletinRestant');
        $percent = ($votant > 0) ? ($nosVoix / $votant*100) : 0;

        $total = [
            'votantInitial' => $votantInitial,
            'votant' => $votant,
            'nosVoix' => $nosVoix,
            'bulletinRestant' => $bulletinRestant,
            'percent' => round($percent, 2),
        ];
        return view('admin.result', compact('results', 'total'));
    }


    public function details()
    {
        $candidat = Candidat::where('email', Auth::user()->email)
            ->orWhere('phone', Auth::user()->phone)
            ->first();

        $results = $candidat->results()
            ->with('circonscripton.province')
            ->get();

        $sums = [];


        if (Auth::user()->candidat->type->id == 1) {
            $i = 1;
            foreach ($results as $result) {
                $province = $result->circonscripton->province->titre;

                if (!isset($sums[$province])) {
                    $sums[$province] = [
                        'i' => $i,
                        'votantInitial' => 0,
                        'votant' => 0,
                        'nosVoix' => 0,
                        'bulletinRestant' => 0,
                        'Pourcentage' => 0,
                    ];
                    $i++;
                }

                $sums[$province]['votantInitial'] += $result->votantInitial;
                $sums[$province]['votant'] += $result->votant;
                $sums[$province]['nosVoix'] += $result->nosVoix;
                $sums[$province]['bulletinRestant'] += $result->bulletinRestant;

                $totalVotant = $sums[$province]['votant'];
                $totalNosVoix = $sums[$province]['nosVoix'];
                $sums[$province]['Pourcentage'] = ($totalVotant > 0) ? ($totalNosVoix / $totalVotant) * 100 : 0;
            }
        }

        if (Auth::user()->candidat->type->id != 1) {
            $i = 1;
            foreach ($results as $result) {
                $circonscription = $result->circonscripton->name;

                if (!isset($sums[$circonscription])) {
                    $sums[$circonscription] = [
                        'i' => $i,
                        'votantInitial' => 0,
                        'votant' => 0,
                        'nosVoix' => 0,
                        'bulletinRestant' => 0,
                        'Pourcentage' => 0,
                    ];
                    $i++;
                }

                $sums[$circonscription]['votantInitial'] += $result->votantInitial;
                $sums[$circonscription]['votant'] += $result->votant;
                $sums[$circonscription]['nosVoix'] += $result->nosVoix;
                $sums[$circonscription]['bulletinRestant'] += $result->bulletinRestant;

                // Calcul du pourcentage pour cette circonscription
                $totalVotant = $sums[$circonscription]['votant'];
                $totalNosVoix = $sums[$circonscription]['nosVoix'];
                $sums[$circonscription]['Pourcentage'] = ($totalVotant > 0) ? ($totalNosVoix / $totalVotant) * 100 : 0;
            }
        }

        $res = Result::where('candidat_id', $candidat->id);
        $votantInitial = $res->sum('votantInitial');
        $votant = $res->sum('votant');
        $nosVoix = $res->sum('nosVoix');
        $bulletinRestant = $res->sum('bulletinRestant');
        $percent = ($votant > 0) ? ($nosVoix / $votant*100) : 0;

        $total = [
            'votantInitial' => $votantInitial,
            'votant' => $votant,
            'nosVoix' => $nosVoix,
            'bulletinRestant' => $bulletinRestant,
            'percent' => round($percent, 2),
        ];

        $sums = $this->paginateResults($sums,10);

        return view('admin.details', compact('results', 'sums', 'total', 'candidat'));
    }

    public function showChangePasswordForm()
    {
        return view('admin.change-password');
    }

    private function paginateResults($results, $perPage = 1)
    {
        $page = request('page', 1);
        $offset = ($page - 1) * $perPage;

        $paginatedResults = array_slice($results, $offset, $perPage);

        return new LengthAwarePaginator(
            $paginatedResults,
            count($results),
            $perPage,
            $page,
            ['path' => url()->current()]
        );
    }

}
