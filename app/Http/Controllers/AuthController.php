<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use App\Models\Chauffeur;
use App\Models\Client;
use App\Models\Transporteur;
use App\Models\User;
use App\Models\Vehicule;
//use App\Models\StockDepot;
//use App\Models\Utilisateur;
//use App\Models\Vente;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{
    public function sign_in()
    {
        return view('pages.auth.sign-in');
    }

    public function connexion(Request $request)
    {
        $this->validate($request, [
            'login' => 'required',
            'mot_de_passe' => 'required'
        ]);

        $get_profil=substr($request->login,0,2);
        if ($get_profil == 'ch') {
            $get_login = Chauffeur::where('login', $request->login)->where('etat', 'activer')->where('is_deleted', 0)->get(
                [
                    'id', 'login', 'prenom', 'nom', 'telephone', 'etat', 'photo', 'email'
                ]
            );
            if (count($get_login) > 0) {
                $get_password = Chauffeur::where('login', $get_login[0]->login)->get();
                if (Hash::check($request->mot_de_passe, $get_password[0]->password)) {
                    $get_login[0]->profil='Chauffeur';
                    $request->session()->put('the_user', $get_login);
                    //$profil = $get_login[0]->profil;
                    return redirect('/welcome');
                }
                return redirect('sign-in')->with('auth_error', 'auth_error');
            }
        } elseif ($get_profil == 'tr') {
            $get_login = Transporteur::where('login', $request->login)->where('etat', 'activer')->where('is_deleted', 0)->get(
                [
                    'id', 'login', 'prenom', 'nom', 'telephone', 'etat', 'photo', 'email'
                ]
            );
            if (count($get_login) > 0) {
                $get_password = Transporteur::where('login', $get_login[0]->login)->get();
                if (Hash::check($request->mot_de_passe, $get_password[0]->password)) {
                    $get_login[0]->profil='Transporteur';
                    $request->session()->put('the_user', $get_login);
                    //$profil = $get_login[0]->profil;
                    return redirect('/welcome');
                }
                return redirect('sign-in')->with('auth_error', 'auth_error');
            }
        } elseif ($get_profil == 'ad') {
            $get_login = User::where('login', $request->login)->where('etat', 'activer')->where('is_deleted', 0)->get(
                [
                    'id', 'login', 'prenom', 'nom', 'telephone', 'etat', 'photo', 'email'
                ]
            );
            if (count($get_login) > 0) {
                $get_password = User::where('login', $get_login[0]->login)->get();
                if (Hash::check($request->mot_de_passe, $get_password[0]->password)) {
                    $get_login[0]->profil='Administrateur';
                    $request->session()->put('the_user', $get_login);
                    //$profil = $get_login[0]->profil;
                    return redirect('/welcome');
                }
                return redirect('sign-in')->with('auth_error', 'auth_error');
            }
        }else {

            $get_login = Client::where('telephone', $request->login)->where('etat', 'activer')->where('is_deleted', 0)->get(
                [
                    'id', 'prenom', 'nom', 'telephone', 'etat', 'photo', 'email'
                ]
            );

            if (count($get_login) > 0) {
                $get_password = Client::where('telephone', $get_login[0]->telephone)->get();
                if (Hash::check($request->mot_de_passe, $get_password[0]->password)) {

                    $get_login[0]->profil='Client';
                    $get_login[0]->login=$request->telephone;
                    $request->session()->put('the_user', $get_login);

                    return redirect('/welcome');
                }else
                return redirect('sign-in')->with('auth_error', 'auth_error');
            }
        }

    }

    public function protect(Request $request)
    {
        if (empty($request->session()->get('the_user'))) {
            return redirect('sign-in');
        } else {
            $the_user = $request->session()->get('the_user');
            return redirect('/welcome');
            /*if ($the_user[0]->profil == 'Caissier') {
                $the_affectation_caissier = $request->session()->get('the_affectation');
                $boutique = new Boutique();
                $vente_jour = $boutique->caissier_vente_jour($the_user[0]->id) - $boutique->total_frais($the_affectation_caissier[0]->nom_boutique);
                $nombre_article = $boutique->caissier_get_stock($the_affectation_caissier[0]->id);
                return view('pages.admin.home', compact('vente_jour', 'nombre_article'))->with('the_user', $the_user);
            }elseif ($the_user[0]->profil == 'Admin') {
                $ventes = new Vente();
                $articles = new Article();
                $stock_depot = new StockDepot();
                $boutique = new Boutique();
                $depot = new Depot();
                $nombre_article = $articles->nombre_articles();
                $nombre_article_depot = $stock_depot->nombre_article_depot();
                $nombre_boutiques = $boutique->nombre_boutiques();
                $nombre_depots = $depot->nombre_depot();
                $vente_jour = $ventes->chiffre_d_affraire_all_caissier();
                return view('pages.admin.home',
                    compact('vente_jour', 'nombre_article', 'nombre_article_depot', 'nombre_boutiques', 'nombre_depots'))
                    ->with('the_user', $the_user);
            }elseif ($the_user[0]->profil == 'Gerant') {
                $the_affectation_gerant = $request->session()->get('the_affectation');
                $boutique = new Boutique();
                $stock_depot = new StockDepot();
                $nombre_article_depot = $stock_depot->nombre_article_a_depot($the_affectation_gerant[0]->id);
                $montant_frais = $boutique->total_frais($the_affectation_gerant[0]->nom_boutique);
                return view('pages.admin.home',
                    compact('montant_frais', 'nombre_article_depot'))->with('the_user', $the_user);
            }*/
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('the_user');
        return redirect('sign-in');
    }
}
