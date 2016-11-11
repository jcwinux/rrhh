<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GeneralController extends Controller
{
    public function validate_email($email)
	{	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			return response()->json(array("result"=>"error","msg"=>"Dirección de correo no válida."));
		return response()->json(array("result"=>"success","msg"=>"Nombre de usuario disponible."));
	}
}
