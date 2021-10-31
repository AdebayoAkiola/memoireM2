<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if((session('the_user')[0]->profil == "Client")){
            $nomtrajet=Str::ucfirst($request->ville_depart.' ----->  '.$request->ville_darriver);
            $courses = DB::table('courses')
            ->join('vehicules', 'vehicules.id', '=', 'courses.id_vehicule')
            ->join('chauffeurs', 'chauffeurs.id', '=', 'courses.id_chauffeur')
            ->join('trajets', 'trajets.id', '=', 'courses.id_trajet')
            /**->where('courses.id_vehicule', '=', 'vehicules.id')*/
            ->where('trajets.nom_trajet', '=',  $nomtrajet)
            ->where('courses.date_depart', '>=', date('Y-m-d'))
            ->where('courses.is_deleted', '=', 0)

            ->orderBy('date_depart', 'desc')
            ->get(
                [
                    'courses.id','courses.date_depart', 'courses.heure_depart', 'courses.duree', 'courses.prix', 'courses.etat',
                    'vehicules.immatriculation', 'vehicules.nombre_de_place', 'chauffeurs.nom', 'chauffeurs.prenom', 'trajets.nom_trajet'
                ]
            );
            return view('pages/admin/reservations/index',compact('courses'));
        }else{
            $courses = DB::table('courses')
            ->join('vehicules', 'vehicules.id', '=', 'courses.id_vehicule')
            ->join('chauffeurs', 'chauffeurs.id', '=', 'courses.id_chauffeur')
            ->join('trajets', 'trajets.id', '=', 'courses.id_trajet')
            /**->where('courses.id_vehicule', '=', 'vehicules.id')
            ->where('courses.id_trajet', '=', 'chauffeurs.id')*/
            ->where('courses.is_deleted', '=', 0)

            ->orderBy('date_depart', 'desc')
            ->get(
                [
                    'courses.id','courses.date_depart', 'courses.heure_depart', 'courses.duree', 'courses.prix', 'courses.etat',
                    'vehicules.immatriculation', 'vehicules.nombre_de_place', 'chauffeurs.nom', 'chauffeurs.prenom', 'trajets.nom_trajet'
                ]
            );
            return view('pages/admin/reservations/index',compact('courses'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id_course=$request->id;
        return view('pages/admin/reservations/create',compact('id_course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = Reservation::create([

            'nombre_de_place' => $request->nombre_de_place,
            'point_depart' => $request->point_depart,
            'point_darrivee' => $request->point_darrivee,
            'etat' => 'desactiver',
            'id_course' => $request->id_course,
            'id_client' => session('the_user')[0]->id
        ]);

        return redirect()->route('reservation.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
