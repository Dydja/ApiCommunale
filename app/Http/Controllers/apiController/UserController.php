<?php

namespace App\Http\Controllers\apiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $data=[];
        $loginData = $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials'],400);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $user = auth::user();

        $IdCommune = Commune::where("id", $user->id)->value('nom');
        $IdTypeUtilisateur = TypeUtilisateur::where("id", $user->id)->value('profil');
       

        $data[] =  [
            'id' => $user->id,
            'nom' => $user->nom,
            'email' => $user->email,
            'prenom' => $user->prenom,
            'numero'=> $user->numero,
            'sexe' => $user->sexe,
            'date_naisance'=> $user->date_naisance,
            'lieu_naissance' => $user->lieu_naisance,
            'IdCommune' => $user->IdCommune,
            'IdTypeUtilisateur' => $user->IdTypeUtilisateur,
            'token' => $accessToken
        ];

        return response()->json($data,200);
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
