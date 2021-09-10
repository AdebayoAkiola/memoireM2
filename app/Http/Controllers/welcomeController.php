<?php
namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
class welcomeController extends Controller
{
    public function connexion()
    {
        $sessions = session()->get('the_user');
        return view('pages.admin.home', compact('sessions'));
        }
    }
