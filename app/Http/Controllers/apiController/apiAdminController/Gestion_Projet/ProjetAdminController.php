<?php

namespace App\Http\Controllers\apiController\apiAdminController\Gestion_Projet;

use App\Models\Projet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjetResource;
use Illuminate\Support\Facades\Validator;

class ProjetAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Projet::latest()->get();
        return response()->json(["message"=>'Liste des projets trouvés avec succès.',ProjetResource::collection($data)]);

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

        $validator = Validator::make($input, [
            'titre' => 'required',
            'description' =>'required',
        ]);

        //conditions de stokage
        if($validator->fails()){
            return response()->json('Validation Error.', $validator->errors());
        }

        $projet=Projet::create([
            'titre' =>$request->titre,
            'description'=>$request->description
        ]);
        return response()->json(['message' =>'Projet crée avec succès.','status'=>200, new ProjetResource($projet)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet,$id)
    {
        //

        $projet = Projet::find($id);
        if(is_null($projet)) {
            return response()->json(["message"=>'Projet non trouvé!', "status"=>404]);
        }
        return response()->json(['message' =>"Projet récupéré avec succès",'status'=>200,new ProjetResource($projet)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $projet = Projet::find($id);
        if(is_null($projet))
        {
           return response()->json(['message' => "Projet non trouvé!", 404]);
        }
        $projet->update($request->all());
        return response()->json(['message' =>"Projet modifié avec successfully!",'status'=>201,new ProjetResource($projet)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $projet=Projet::find($id);
         $projet->delete();
        return response()->json(["Projet supprimé avec succès"]);

    }
}
