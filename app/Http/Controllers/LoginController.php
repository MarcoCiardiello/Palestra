<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class LoginController extends Controller
{

    /*public function getLogin($email, $password = null)
    {
        if (!is_null($password) ||!is_null($email)) {
            $login = Advertisment::where('password' , $password)->get();
            return response()-json($login::find)
        }

        return $login;
    }*/


    public function getLogin($email, $password)
    {
        $email= Login::where('email',$email)->get();
        $password=Login::where('password', $password)->get();
        if(is_null($email || $password))
        {
            return response()->json(['message'=>'account non trovato', 'status'=>404]);
        }
        return response()->json(['email'=>$email]);
    }
    /*
    public function getLogin($email, $password)
    {
        $login = Login::find($email, $password);
        if(is_null($login))
        {
            return response()->json(['message'=>'Login non trovato.'], 404);
        }
        return response()->json($login::find($email, $password), 200);

    }*/

    public function postLogin(Request $request)
    {
        try {

            $login = new Login();

            $login->email = $request->email;
            $login->password = $request->password;

            $login->save();

            return response()->json([
                'message' => 'account inserito',
                'status' => 200,

            ]);

        } catch (\exception $e) {
            return response()->json([
                'message' => 'account non inserito',
                'status' => 201,
                '4' => $e,

            ]);
        }
    }
}
