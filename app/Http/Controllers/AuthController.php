<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Session\Store;
use Closure;

use Illuminate\Http\Request;

use App\Http\Requests\LoginUser;
use App\Http\Requests;
use Session;

class AuthController extends Controller
{	protected $session;
	public function __construct(Store $session){
		$this->session=$session;
	}
	
    public function authenticate(LoginUser $request)
    {	if (Auth::attempt(['username' => $request->usuario, 'password' => $request->clave],true)) 
		{	$this->session->put('lastActivityTime',time());
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
	
	public function quit_app()
	{	if (Auth::check())
		{	Auth::logout(); 
		}
		
		Session::flash('quit_message', "Su sesión ha sido finalizada, porque se ha detectado inactividad en los últimos 20 minutos.");
		return redirect('/');
	}
}