<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests\LoginUser;
use App\Http\Requests;
use Session;

class AuthController extends Controller
{
    public function authenticate(LoginUser $request)
    {	if (Auth::attempt(['username' => $request->usuario, 'password' => $request->clave],true)) {
            return redirect()->intended('modulos');
        }
		
		Session::flash('fail_message', "El usuario o la contraseña no son correctos.");
		return Redirect::back();
    }
	
	public function logout()
	{	if (Auth::check())
		{	Auth::logout(); 
		}
		
		Session::flash('bye_message', "Sesión finalizada con éxito.");
		return redirect('/');
	}
}