<?php

namespace App\Http\Controllers\apiController\apiAdminController\Gestion_Projet;

use App\Models\Probleme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProblemeResource;
use Illuminate\Support\Facades\Validator;

class ProblemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Probleme::latest()->get();
        return response()->json(["message"=>'Liste des projets trouvés avec succès.',ProblemeResource::collection($data)]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $input = $request->all();

        $validator =  Validator::make($input,[
            'images'=>'required',
            'commentaire'=>'required',
            'localisation'=>'required',
            'IdUser'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(["Problème not found"]);
        }

        $idee = new Probleme();
        //insertion de l'images
        if($request->hasFile('images')){
            $photo = $request->file('images');
            $extension = $photo->getClientOriginalName();
            $fileName = $extension;
            $photo->move('uploads/images/'.$fileName);
            $idee->images = $fileName;
        }
        $idee->images = $request->input('images');
        $idee->commentaires = $request->input('commentaires');
        $idee->localisation = $request->input('localisation');
        $idee->IdUser = $request->input('IdUser');

        $idee->save();
        return response()->json(["Problème enregistrer avec succès"]);

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
