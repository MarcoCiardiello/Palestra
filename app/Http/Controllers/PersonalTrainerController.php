<?php

namespace App\Http\Controllers;

use App\Models\PersonalTrainer;
use Illuminate\Http\Request;

class PersonalTrainerController extends Controller
{
    public function postPersonalTrainer(Request $request)
    {
        try{

            $personalTrainer = new PersonalTrainer;

            $personalTrainer->nome = $request->nome;
            $personalTrainer->cognome = $request->cognome;

            $personalTrainer->save();

            return response()->json([
               'message'=>'personal trainer inserito',
               'personal trainer'=>$personalTrainer,
                'status' => 200

            ]);

        }catch (\exception $e){

            return response()->json([
                'message'=>'personal trainer non inserito',
                'personal trainer'=>$personalTrainer,
                'status' => 201,
                '4' => $e

            ]);

        }
    }

    public function index()
    {
        //
    }
}
