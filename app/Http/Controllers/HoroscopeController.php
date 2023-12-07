<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;



class HoroscopeController extends Controller
{

    public function __construct()
    {
        $this->middleware('web');
    }

    public function index(Request $request)
    {
        // Vérifie si le user est connecté
        if ($request->session()->has('name')) {
            // Si oui, récupère les données du user depuis la base de données
            $name = $request->session()->get('name');
            $user = User::where('name', $name)->first();


            // Vérifie si le user a été trouvé
            if ($user) {
                $sign = session('sign');
                $sector = session('sector');

                return view('index', compact('user', 'name', 'sign', 'sector'));
            }
        }

        // Si le user n'est pas connecté ou si une erreur se produit, affiche la vue sans données
        return view('index');
    }

    public function user(Request $request)
    {/*
        if ($request->session()->has('name')) {
            // Si oui, récupère les données du user depuis la base de données
            $name = $request->session()->get('name');
            $user = User::where('name', $name)->first();


            // Vérifie si le user a été trouvé
            if ($user) {
                $sign = session('sign');
                $sector = session('sector');

                return view('index', compact('user', 'name', 'sign', 'sector'));
            }
        }
        */
        return view('user');
    }

    public function connectUser(Request $request)
    {
        $name = $request->input('name');
        
        $user = User::where('name', $name)->first();


        if ($user) {
            $sign = $user->sign;
            $sector = $user->sector;

            $request->session()->put('name', $name);
            $request->session()->put('sign', $sign);
            $request->session()->put('sector', $sector);


            return redirect()->route('home');
        } else {
            $sign = null;
            $sector = null;
    
            session()->flash('message', 'Utilisateur non répertorié.');
        }
    
        return view('index', compact('sign', 'sector'));
    }

    public function deconnection(Request $request)
    {
        $request->session()->forget(['name', 'sign', 'sector']);
    
        // Détruire la session et en régénérer une nouvelle
        $request->session()->regenerate(true);
    
        return view('index');
    }

    public function createUser(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|unique:users',
            'sign' => 'required',
            'sector' => 'required',
        ]);

        $validatedData['sign'] = $request->input('sign');

        // Enregistrement des données dans la DB
        User::create($validatedData);
    
        // Confirmation au ures
        $message = "Bienvenue, {$validatedData['name']} ! Votre compte a été créé avec succès.";
    
        // Redirection vers la vue d'accueil
        return redirect()->route('home')->with('message', $message);
    }

    public function showPrediction(Request $request)
    {
        // Passer les données à la vue et l'afficher
        return view('prediction')->with([
            'sign' => $request->input('signe_astrologique'),
            'sector' => $request->input('sector'),
            'debut' => $request->input('debut'),
            'milieu' => $request->input('milieu'),
            'fin' => $request->input('fin'),
        ]);
    }

    public function generate(Request $request)
    {
        // Récupération des données du formulaire
        $signe_astrologique = $request->input('sign');
        $sector = $request->input('sector');
        $date = Carbon::now()->day;
        
        // ID unique lié aux entrées du user
        $unique_key = Hash::make($signe_astrologique . $sector . $date);

        $seed = crc32($unique_key);

        // indexes aléatoires pour chaque table
        $debutsIndex = $this->randomTableIndex('debuts', $seed);
        $milieuxIndex = $this->randomTableIndex('milieux', $seed);
        $finsIndex = $this->randomTableIndex('fins', $seed);

        // valeurs associées aux indexes
        $selectedDebut = DB::table('debuts')->where('id', $debutsIndex)->value('text');
        $selectedMilieu = DB::table('milieux')->where('id', $milieuxIndex)->value('text');
        $selectedFin = DB::table('fins')->where('id', $finsIndex)->value('text');
        
        // Redirection vers la page de la prédiction
        return redirect()->route('prediction', [
            'signe_astrologique' => $signe_astrologique,
            'sector' => $sector,
            'debut' => $selectedDebut,
            'milieu' => $selectedMilieu,
            'fin' => $selectedFin,
        ]);
    }

    private function randomTableIndex($tableName, $seed)
    {
        $totalRows = DB::table($tableName)->count();

        // Utilisation de la sed pour générer un index aléatoire
        srand($seed);
        $randomIndex = rand(1, $totalRows);

        return $randomIndex;
    }

    public function updateUser(Request $request)
    {
        // Récupérez les données du formulaire
        $name = $request->session()->get('name');
        $newName = $request->input('newName');
        $newSign = $request->input('sign');
        $newSector = $request->input('sector');

        // Mettez à jour l'utilisateur
        $user = User::where('name', $name)->first();
        if ($user) {
            User::where('name', $name)->update([
                'name' => $newName,
                'sign' => $newSign,
                'sector' => $newSector,
            ]);

        return redirect()->route('home')->with('message', 'Utilisateur mis à jour avec succès');
        } else {
            return redirect()->route('home')->with('message', 'Utilisateur non trouvé');
        }
    }

    public function delUser(Request $request)
    {
        // Récupérez les données du formulaire
        $name = $request->session()->get('name');

        $user = User::where('name', $name)->first();
        if ($user) {
            $user->delete();

            // Déconnectez l'utilisateur en supprimant la session
            $request->session()->forget('name');
    
            return redirect()->route('home')->with('message', 'Compte supprimé avec succès');
        } else {
            return redirect()->route('home')->with('message', 'Utilisateur non trouvé');
        }
    }

}
