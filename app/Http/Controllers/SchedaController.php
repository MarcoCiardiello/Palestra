<?php

namespace App\Http\Controllers;

use App\Models\Scheda;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class SchedaController extends Controller
{

    public function postScheda(Request $request)
    {

        try{

            $scheda = new Scheda();

            $scheda->id_personal_trainer = $request->id_personal_trainer;
            $scheda->id_atleta = $request->id_atleta;
            $scheda->categoria = $request->categoria;
            $scheda->nome_esercizio = $request->nome_esercizio;
            $scheda->ripetizione = $request->ripetizione;
            $scheda->volte = $request->volte;
            $scheda->calorie_perse = $request->calorie_perse;

            $scheda->save();

            return response() ->json([

                'message'=>'Scheda inserita correttamente',
                'scheda'=>$scheda,
                'status'=>200

            ]);

        }catch(Exception $e){

            return response() ->json([

                'message'=>'Scheda non inserita',
                'scheda'=>$scheda,
                'status'=>200,
                '4'=>$e

            ]);

        }

    }

}
