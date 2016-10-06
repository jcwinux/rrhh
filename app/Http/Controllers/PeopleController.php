<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PeopleController extends Controller
{
    public function crearPersona(Request $request)
	{	//if(Request::ajax()){
			return $request->primer_nombre;
		//}
	}
}
