<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {
        //
    }
// Création d'une nouvelle instance d'utilisateur

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    
    public function store(Request $request)
    {
     
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        //
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // L'authentification a réussi
            return redirect()->intended('/dashboard'); // Redirection vers la page souhaitée après la connexion
        } else {
            // L'authentification a échoué
            return redirect()->route('login-page')->with('error', 'Identifiants incorrects.');
        }
    }


    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login-page');
    }
    public function register(Request $request)
    {
        // Validation des données (facultatif, mais recommandé)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:5',
        ]);

        // Création d'une nouvelle instance d'utilisateur
        $user = new User();

        // Remplissage des informations de l'utilisateur à partir des données du formulaire
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        // Sauvegarde de l'utilisateur dans la base de données
        $user->save();

        // Redirection avec un message de succès
        return redirect()->route('login-page')->with('success', 'Compte créé avec succès! Vous pouvez maintenant vous connecter.');
    }

    public function showRegistrationForm()
    {
        return view('pages.auth.register');
    }
}
