<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::where('is_deleted', 0)->orderBy('id')->get();
        return view('pages.admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages.admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prenom = Str::of($request->prenom)->trim(' ');
        $nom = Str::of($request->nom)->trim(' ');

        $client = Client::create([
            'prenom' => Str::ucfirst($request->prenom),
            'nom' => Str::ucfirst($request->nom),
            'password' => bcrypt($request->password),
            'etat' => 'desactiver',
            'telephone' => $request->telephone,
            'email' => $request->email,
            //'photo' => $request->photo,
            'is_deleted' => 0
        ]);

        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($client)
    {
        $get_user = Client::find($client);


            $singleClient = DB::table('clients')
               /* ->join('boutiques', 'boutiques.id', '=', 'utilisateurs.affectation')*/
                ->where('clients.id', $client)
                ->get([
                    'clients.id',  'clients.prenom', 'clients.nom',
                    'clients.is_deleted', 'clients.etat',
                    'clients.telephone',/* 'clients.photo',*/ 'clients.email'
                ]);


        /*$boutiques = Boutique::where('is_deleted', 0)->orderBy('nom_boutique')->get();
        $depots = Depot::where('is_deleted', 0)->orderBy('nom_depot')->get();
        */
        return view('pages.admin.clients.show', compact('singleClient'));
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
        $user = Client::find($id);

        $newData = [];
        $newDataExist = false;

        if ($user == null) {
            return redirect()->route('client.index')->with('user_not_found', 'user not found');
        }


        /**if (isset($request->login)) {
            $this->validate($request, [
                'login' => 'exists:clients,login',
            ]);
            $newDataExist = true;
            $newData['login'] = $request->login;
        }*/

        if (isset($request->telephone)) {
            $this->validate($request, [
                'telephone' => 'starts_with:30,33,70,75,76,77,78|numeric|min:300000000|max:999999999|unique:clients,telephone,' . $request->id . ',id',
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

        return redirect()->route('client.index')->with('update_success', 'update_success');
    }

    public function status(Request $request, $id)
    {
        $user = Client::find($id);

        $newData = [];
        $newDataExist = false;

        if ($user == null) {
            return redirect()->route('client.index')->with('user_not_found', 'user not found');
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

        return redirect()->route('client.index')->with('update_success', 'update_success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $client = Client::find($id);
        Client::where('id', $client->id)->update(['is_deleted' => 1]);
        return redirect()->route('client.index');
    }
}
