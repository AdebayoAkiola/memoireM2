<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('the_user')[0]->profil == "Transporteur"){
            $chauffeurs = DB::table('chauffeurs')
            ->where('chauffeurs.is_deleted', 0)
            ->where('chauffeurs.id_transporteur', session('the_user')[0]->id)
            ->get([
                'id', 'login', 'prenom', 'note',
                'nom', 'is_deleted', 'etat',
                'telephone', 'photo', 'email'
            ]);
        }else{
            $chauffeurs = DB::table('chauffeurs')
            ->where('is_deleted', 0)
            ->orderBy('nom')
            ->get([
                'id', 'login', 'prenom', 'note',
                'nom', 'is_deleted', 'etat',
                'telephone', 'photo', 'email'
            ]);}
        return view('pages/admin/chauffeurs/index', compact('chauffeurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/admin/chauffeurs/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$validated = $request->validated();

        $prenom = Str::of($request->prenom)->trim(' ');
        $nom = Str::of($request->nom)->trim(' ');
        $login = Chauffeur::generateLogin($prenom, $nom);

        $chauffeur = Chauffeur::create([
            'prenom' => Str::ucfirst($request->prenom),
            'nom' => Str::ucfirst($request->nom),
            'login' => $login,
            'password' => bcrypt('passer'),
            'etat' => 'desactiver',
            'telephone' => $request->telephone,
            'email' => $request->email,
            'id_transporteur' => null,
            'is_deleted' => 0,
            'note' => 0
        ]);

        return redirect()->route('chauffeur.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($chauffeur)
    {
        $get_user = Chauffeur::find($chauffeur);


            $singleChauffeur = DB::table('chauffeurs')
               /* ->join('boutiques', 'boutiques.id', '=', 'utilisateurs.affectation')*/
                ->where('chauffeurs.id', $chauffeur)
                ->get([
                    'chauffeurs.id', 'chauffeurs.login', 'chauffeurs.prenom',
                    'chauffeurs.nom', 'chauffeurs.is_deleted', 'chauffeurs.etat',
                    'chauffeurs.telephone', 'chauffeurs.photo', 'chauffeurs.email'
                ]);


        /*$boutiques = Boutique::where('is_deleted', 0)->orderBy('nom_boutique')->get();
        $depots = Depot::where('is_deleted', 0)->orderBy('nom_depot')->get();
        */
        return view('pages.admin.chauffeurs.show', compact('singleChauffeur'));
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
        $user = Chauffeur::find($id);

        $newData = [];
        $newDataExist = false;

        if ($user == null) {
            return redirect()->route('chauffeur.index')->with('user_not_found', 'user not found');
        }


        if (isset($request->login)) {
            $this->validate($request, [
                'login' => 'exists:chauffeurs,login',
            ]);
            $newDataExist = true;
            $newData['login'] = $request->login;
        }

        if (isset($request->telephone)) {
            $this->validate($request, [
                'telephone' => 'starts_with:30,33,70,75,76,77,78|numeric|min:300000000|max:999999999|unique:chauffeurs,telephone,' . $request->id . ',id',
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

        if ($newDataExist) {
            $user->update($newData);
        }

        return redirect()->route('chauffeur.index')->with('update_success', 'update_success');
    }
    public function status(Request $request, $id)
    {
        $user = Chauffeur::find($id);

        $newData = [];
        $newDataExist = false;

        if ($user == null) {
            return redirect()->route('chauffeur.index')->with('user_not_found', 'user not found');
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

        return redirect()->route('chauffeur.index')->with('update_success', 'update_success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $chauffeur = Chauffeur::find($id);
        Chauffeur::where('id', $chauffeur->id)->update(['is_deleted' => 1]);
        return redirect()->route('chauffeur.index');
    }
}
