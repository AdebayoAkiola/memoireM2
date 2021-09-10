<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = DB::table('courses')
        ->join('vehicules', 'vehicules.id', '=', 'courses.id_vehicule')
        ->join('chauffeurs', 'chauffeurs.id', '=', 'courses.id_chauffeur')
        ->join('trajets', 'trajets.id', '=', 'courses.id_trajet')
        /**->where('courses.id_vehicule', '=', 'vehicules.id')
        ->where('courses.id_chauffeur', '=', 'chauffeurs.id')*/
        ->where('courses.is_deleted', '=', 0)

        ->orderBy('date_depart', 'desc')
        ->get(
            [
                'courses.id','courses.date_depart', 'courses.heure_depart', 'courses.duree', 'courses.prix', 'courses.etat',
                'vehicules.immatriculation', 'vehicules.nombre_de_place', 'chauffeurs.nom', 'chauffeurs.prenom', 'trajets.nom_trajet'
            ]
        );

        return view('pages/admin/courses/index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/admin/courses/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create([
            'date_depart' => $request->datedepart,
            'heure_depart' => $request->heure,
            'duree' => $request->duree,
            'prix' => $request->prix,
            'id_vehicule' => 1,
            'etat' => 'activer',
            'id_chauffeur' => 2,
            'id_trajet' => $request->trajet,
            'is_deleted' => 0
        ]);
        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($course)
    {
        $get_user = Course::find($course);

        $singlePhoto = DB::table('chauffeurs')
        /* ->join('boutiques', 'boutiques.id', '=', 'utilisateurs.affectation')*/
         ->where('chauffeurs.id', $get_user->id_chauffeur)
         ->get([
             'chauffeurs.photo'
         ]);
            $singleCourse = DB::table('courses')
               /* ->join('boutiques', 'boutiques.id', '=', 'utilisateurs.affectation')*/
                ->where('courses.id', $course)
                ->get([
                    'courses.id', 'courses.date_depart', 'courses.heure_depart',
                    'courses.prix', 'courses.is_deleted', 'courses.etat'
                ]);


        /*$boutiques = Boutique::where('is_deleted', 0)->orderBy('nom_boutique')->get();
        $depots = Depot::where('is_deleted', 0)->orderBy('nom_depot')->get();
        */
        return view('pages.admin.courses.show', compact('singleCourse','singlePhoto'));
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
        $user = Course::find($id);

        $newData = [];
        $newDataExist = false;

        if ($user == null) {
            return redirect()->route('course.index')->with('user_not_found', 'user not found');
        }


        if (isset($request->date_depart)) {
            $this->validate($request, [
                'date_depart' => 'exists:courses,date_depart',
            ]);
            $newDataExist = true;
            $newData['date_depart'] = $request->date_depart;
        }

        if (isset($request->heure_depart)) {
            $this->validate($request, [
                'heure_depart' => 'min:3|max:10',
            ]);

            $newDataExist = true;
            $newData['heure_depart'] = $request->heure_depart;
        }

        if (isset($request->duree)) {
            $this->validate($request, [
                'duree' => 'min:2|max:20',
            ]);

            $newDataExist = true;
            $newData['duree'] = $request->duree;
        }

        if (isset($request->prix)) {
            $this->validate($request, [
                'prix' => 'min:2|max:5',
            ]);

            $newDataExist = true;
            $newData['prix'] = $request->prix;
        }

        if ($newDataExist) {
            $user->update($newData);
        }

        return redirect()->route('course.index')->with('update_success', 'update_success');
    }

    public function status(Request $request, $id)
    {
        $user = Course::find($id);

        $newData = [];
        $newDataExist = false;

        if ($user == null) {
            return redirect()->route('course.index')->with('user_not_found', 'user not found');
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

        return redirect()->route('course.index')->with('update_success', 'update_success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $course = Course::find($id);
        Course::where('id', $course->id)->update(['is_deleted' => 1]);
        return redirect()->route('course.index');
    }
}
