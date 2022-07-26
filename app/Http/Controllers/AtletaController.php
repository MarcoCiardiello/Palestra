<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atleta;

class AtletaController extends Controller
{
    /**
     *
     * Funzione che permette di stampare un utente in base al suo ID
     *
     */
    public function getAtletaById($id)
    {
        $atleta = Atleta::find($id);
        if(is_null($atleta))
        {
            return response()->json(['message'=>'Atleta non trovato.'], 404);
        }
        return response()->json($atleta::find($id), 200);

    }

    /**
     *
     * Funzione che permette la stampa degli atleti
     *
     */
    public function getAtleta(){

        return response()->json(Atleta::all(), 200);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * Funzione che permette l'inserimento degli atleti
     *
     */
    public function postAtleta(Request $request)
    {

        try {

            $atleta = new Atleta;

            $atleta->nome = $request->nome;
            $atleta->cognome = $request->cognome;

            $atleta->save();

            return response()->json([
                'message' => 'atleta inserito',
                'atleta' => $atleta,
                'status' => 200,

            ]);

        } catch (\exception $e) {
            return response()->json([
                'message' => 'atleta non inserito',
                'atleta' => $atleta,
                'status' => 201,
                '4' => $e,

            ]);
        }



    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     *
     * Funzione che permette di modificare un atleta ricercandolo tramite il suo ID
     *
     */
    public function updateAtleta(Request $request, $id)
    {
        $atleta = Atleta::find($id);
        if(is_null($atleta))
        {
            return response()->json(['message'=>'Atleta non trovato'], 404);
        }
        $atleta->update($request->all());
        return response($atleta, 200);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     *
     * Funzione che permette di eliminare un atleta ricercandolo tramite il suo ID
     *
     */
    public function deleteAtleta(Request $request, $id)
    {
        $atleta = Atleta::find($id);
        if(is_null($id))
        {
            return response()->json(['message'=>'Atleta non trovato'], 404);
        }
        $atleta->delete();
        return response()->json(null, 204);
    }
}
