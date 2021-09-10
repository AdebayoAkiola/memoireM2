<?php

namespace App\Http\Controllers;

use App\Models\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TrajetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trajets = Trajet::where('is_deleted', 0)->orderBy('id')->get();
        return view('pages/admin/trajets/index', compact('trajets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/admin/trajets/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $trajet = Trajet::create([
            'ville_depart' => Str::ucfirst($request->ville_depart),
            'ville_darrivee' => Str::ucfirst($request->ville_darriver),
            'nom_trajet' => Str::ucfirst($request->ville_depart.' ----->  '.$request->ville_darriver),
            'is_deleted' => 0
        ]);

        return redirect()->route('trajet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($trajet)
    {
        $get_user = Trajet::find($trajet);


            $singleTrajet = DB::table('trajets')
               /* ->join('boutiques', 'boutiques.id', '=', 'utilisateurs.affectation')*/
                ->where('trajets.id', $trajet)
                ->get([
                    'trajets.id', 'trajets.ville_depart', 'trajets.is_deleted',
                    'trajets.ville_darrivee', 'trajets.nom_trajet'
                ]);


        /*$boutiques = Boutique::where('is_deleted', 0)->orderBy('nom_boutique')->get();
        $depots = Depot::where('is_deleted', 0)->orderBy('nom_depot')->get();
        */
        return view('pages.admin.trajets.show', compact('singleTrajet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Trajet::find($id);

        $newData = [];
        $newDataExist = false;

        if ($user == null) {
            return redirect()->route('trajet.index')->with('user_not_found', 'user not found');
        }


        if (isset($request->ville_depart)) {
            $this->validate($request, [
                'ville_depart' => 'min:3|max:30',
            ]);
            $newDataExist = true;
            $newData['ville_depart'] = $request->ville_depart;

        }

        if (isset($request->ville_darrivee)) {
            $this->validate($request, [
                'ville_depart' => 'min:3|max:30',
            ]);
            $newDataExist = true;
            $newData['ville_darrivee'] = $request->ville_darrivee;

        }

        if ($newDataExist) {
            $newData['nom_trajet'] = Str::ucfirst($request->ville_depart.' ----->  '.$request->ville_darrivee);
            $user->update($newData);
        }

        return redirect()->route('trajet.index')->with('update_success', 'update_success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $trajet = Trajet::find($id);
        Trajet::where('id', $trajet->id)->update(['is_deleted' => 1]);
        return redirect()->route('trajet.index');
    }
}
