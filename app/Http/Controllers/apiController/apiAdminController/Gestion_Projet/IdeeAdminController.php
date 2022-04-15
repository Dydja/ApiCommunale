<?php

namespace App\Http\Controllers\apiController\apiAdminController\Gestion_Projet;

use App\Models\User;
use App\Models\Domaine;
use Illuminate\Http\Request;
use App\Models\PropositionIdee;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\IdeeResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IdeeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $idee =  PropositionIdee::orderBy('description')->get();
        $message = "Liste des idées proposés par vos citoyens!";
        $status = 200;
        return response()->json([$message,$status,IdeeResource::collection($idee)]);
        // return response()->json(["message"=>'Liste des propositions idéee trouvés avec succès.',$idee,200]);
        //return IdeeResource::collection($idee,$message);
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

        $validator = Validator::make($input,[
            'description' => 'required',
            'IdUser'=>'required',
            'IdDomaine'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'message'=>$validator->errors(),
                'status' => 400,

            ]);
        }

        $projet=PropositionIdee::create([

            'description'=>$request->description,
            'IdUser' =>$request->IdUser,
            'IdDomaine' =>$request->IdDomaine,
        ]);
        return response()->json([new IdeeResource($projet), 'Idée ajoutée avec succès !.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PropositionIdee $idee, $id)
    {
        //
        $idee = PropositionIdee::find($id);
        $message = "Idée retrouvée avec succès !!";

        $status = 200;
        if(is_null($idee))
        {
            return response()->json(["message"=>"Idée non trouvée!","status"=>400]);
        }
        return response()->json(['message' =>"Idée récupéré avec succès",'status'=>200,new IdeeResource($idee)]);

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
        // $m =  PropositionIdee::find($id);
        // $m->update($request->all());
        // return response()->json($m);

        $idee = PropositionIdee::find($id);
        if(is_null($idee))
        {
           return response()->json(['message' => "Idée non trouvé!", 'status'=>404]);
        }
        $idee->update($request->all());
        return response()->json(['message' =>"Idée modifié avec successfully!",'status'=>201,new IdeeResource($idee)]);
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
        $idee = PropositionIdee::find($id);
        $idee->delete();
        return response()->json(['Supression effectué avec succès']);
    }

    public function search($IdUser)
    {
        //
        return PropositionIdee::where('user','like','%'.$IdUser.'%')->get();
    }

    public function ideeDelete()
    {
        $deleteIdee = DB::table('proposition_idees')
                ->where('deleted_at', '<>', null)
                ->get();

        return response()->json([$deleteIdee]);
    }
}
