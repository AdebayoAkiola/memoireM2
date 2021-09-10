<?php

namespace App\Http\Controllers;

use App\Models\Transporteur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TransporteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transporteurs = Transporteur::where('is_deleted', 0)->orderBy('nom')->get();
        return view('pages/admin/transporteurs/index', compact('transporteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/admin/transporteurs/create');
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
        $prenom = Str::of($request->prenom)->trim(' ');
        $nom = Str::of($request->nom)->trim(' ');
        $login = Transporteur::generateLogin($prenom, $nom);

        $transporteur = Transporteur::create([
            'prenom' => Str::ucfirst($request->prenom),
            'nom' => Str::ucfirst($request->nom),
            'login' => $login,
            'password' => bcrypt('passer'),
            'etat' => 'desactiver',
            'telephone' => $request->telephone,
            'email' => $request->email,
            'is_deleted' => 0,
            'note' => 0
        ]);

        return redirect()->route('transporteur.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($transporteur)
    {
        $get_user = Transporteur::find($transporteur);


            $singleTransporteur = DB::table('transporteurs')
               /* ->join('boutiques', 'boutiques.id', '=', 'utilisateurs.affectation')*/
                ->where('transporteurs.id', $transporteur)
                ->get([
                    'transporteurs.id', 'transporteurs.login', 'transporteurs.prenom',
                    'transporteurs.nom', 'transporteurs.is_deleted', 'transporteurs.etat',
                    'transporteurs.telephone', 'transporteurs.photo', 'transporteurs.email'
                ]);


        /*$boutiques = Boutique::where('is_deleted', 0)->orderBy('nom_boutique')->get();
        $depots = Depot::where('is_deleted', 0)->orderBy('nom_depot')->get();
        */
        return view('pages.admin.transporteurs.show', compact('singleTransporteur'));
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
        $user = Transporteur::find($id);

        $newData = [];
        $newDataExist = false;

        if ($user == null) {
            return redirect()->route('transporteur.index')->with('user_not_found', 'user not found');
        }


        if (isset($request->login)) {
            $this->validate($request, [
                'login' => 'exists:transporteurs,login',
            ]);
            $newDataExist = true;
            $newData['login'] = $request->login;
        }

        if (isset($request->telephone)) {
            $this->validate($request, [
                'telephone' => 'starts_with:30,33,70,75,76,77,78|numeric|min:300000000|max:999999999|unique:transporteurs,telephone,' . $request->id . ',id',
            ]);

            $newDataExist = true;
            $newData['telephone'] = $request->telephone;
        }

        if (isset($request->prenom)) {
            $this->validate($request, [
                'prenom' => 'min:3|max:30',
            ]);

            $newDataExist = true;
            $newData['prenom'] = $request->prenom;
        }

        if (isset($request->nom)) {
            $this->validate($request, [
                'nom' => 'min:2|max:20',
            ]);

            $newDataExist = true;
            $newData['nom'] = $request->nom;
        }

        if (isset($request->email)) {
            $this->validate($request, [
                'email' => 'min:2|max:50',
            ]);

            $newDataExist = true;
            $newData['email'] = $request->email;
        }



        /*if (isset($request->boutique)) {
            $this->validate($request, [
                'boutique' => 'exists:boutiques,id',
            ]);

            $newDataExist = true;
            $newData['affectation'] = $request->boutique;
        }

        if (isset($request->depot)) {
            $this->validate($request, [
                'depot' => 'exists:depots,id',
            ]);

            $newDataExist = true;
            $newData['affectation'] = $request->depot;
        }*/

        if ($newDataExist) {
            $user->update($newData);
        }

        return redirect()->route('transporteur.index')->with('update_success', 'update_success');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        $user = Transporteur::find($id);

        $newData = [];
        $newDataExist = false;

        if ($user == null) {
            return redirect()->route('transporteur.index')->with('user_not_found', 'user not found');
        }
        else
        $newDataExist = true;

        if ($user['etat'] == 'desactiver') {
            $newData['etat'] = 'activer';
        }elseif ($user['etat'] == 'activer') {
            $newData['etat'] = 'suspendus';
        }else
            $newData['etat'] = 'activer';


        if ($newDataExist) {
            $user->update($newData);
        }

        return redirect()->route('transporteur.index')->with('update_success', 'update_success');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $transporteur = Transporteur::find($id);
        Transporteur::where('id', $transporteur->id)->update(['is_deleted' => 1]);
        return redirect()->route('transporteur.index');
    }
}
