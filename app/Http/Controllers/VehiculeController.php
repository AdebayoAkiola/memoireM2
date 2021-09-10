<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules = Vehicule::where('is_deleted', 0)->orderBy('id')->get();
        return view('pages/admin/vehicules/index', compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/admin/vehicules/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicule = Vehicule::create([
            'immatriculation' => $request->immatriculation,
            'nombre_de_place' => $request->nbplace,
            'id_transporteur' => 1,
            'etat' => 'desactiver',
            'photo1' => '',
            'photo2' => '',
            'photo3' => '',
            'is_deleted' => 0
        ]);

        return redirect()->route('vehicule.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($vehicule)
    {
        $get_user = Vehicule::find($vehicule);


            $singleVehicule = DB::table('vehicules')
               /* ->join('boutiques', 'boutiques.id', '=', 'utilisateurs.affectation')*/
                ->where('vehicules.id', $vehicule)
                ->get([
                    'vehicules.id',  'vehicules.immatriculation', 'vehicules.nombre_de_place',
                    'vehicules.id_transporteur', 'vehicules.etat', 'vehicules.photo1', 'vehicules.photo2', 'vehicules.photo3'
                ]);


        /*$boutiques = Boutique::where('is_deleted', 0)->orderBy('nom_boutique')->get();
        $depots = Depot::where('is_deleted', 0)->orderBy('nom_depot')->get();
        */
        return view('pages.admin.vehicules.show', compact('singleVehicule'));
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
        $user = Vehicule::find($id);

        $newData = [];
        $newDataExist = false;

        if ($user == null) {
            return redirect()->route('vehicule.index')->with('user_not_found', 'user not found');
        }


        /**if (isset($request->login)) {
            $this->validate($request, [
                'login' => 'exists:clients,login',
            ]);
            $newDataExist = true;
            $newData['login'] = $request->login;
        }

        if (isset($request->telephone)) {
            $this->validate($request, [
                'telephone' => 'starts_with:30,33,70,75,76,77,78|numeric|min:300000000|max:999999999|unique:clients,telephone,' . $request->id . ',id',
            ]);

            $newDataExist = true;
            $newData['telephone'] = $request->telephone;
        }*/

        if (isset($request->immatriculation)) {
            $this->validate($request, [
                'immatriculation' => 'min:6|max:12',
            ]);

            $newDataExist = true;
            $newData['immatriculation'] = $request->immatriculation;
        }

        if (isset($request->nombre_de_place)) {
            $this->validate($request, [
                'nombre_de_place' => 'min:1|max:2',
            ]);

            $newDataExist = true;
            $newData['nombre_de_place'] = $request->nombre_de_place;
        }

        if ($newDataExist) {
            $user->update($newData);
        }

        return redirect()->route('vehicule.index')->with('update_success', 'update_success');
    }
    public function status(Request $request, $id)
    {
        $user = Vehicule::find($id);

        $newData = [];
        $newDataExist = false;

        if ($user == null) {
            return redirect()->route('vehicule.index')->with('user_not_found', 'user not found');
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

        return redirect()->route('vehicule.index')->with('update_success', 'update_success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $vehicule = Vehicule::find($id);
        Vehicule::where('id', $vehicule->id)->update(['is_deleted' => 1]);
        return redirect()->route('vehicule.index');
    }
}
