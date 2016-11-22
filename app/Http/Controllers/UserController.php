<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Session;

use App\Http\Requests;


use App\Role;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	$roles = Role::where('estado','ACTIVO')->get();
		$users = User::all();
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
		return view('pages.configuracion.form_usuario',compact('str_random','roles','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	$json_user = json_decode($request->data,true);
		if ($json_user["user_id"]=="")
		{	$oUser = new User();
			$oUser->password	= bcrypt($json_user["username"]);
		}
		else
			$oUser = User::find($json_user["user_id"]);
		
		$oUser->role_id		= $json_user["role_id"];
		$oUser->nombre		= $json_user["nombre"];
		$oUser->apellido	= $json_user["apellido"];
		$oUser->correo		= $json_user["correo"];
		$oUser->username	= $json_user["username"];
		$oUser->save();
		
		return response()->json(array("result"=>"success","msg"=>"Todo OK","user_id"=>$oUser->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {	$oUser = User::find($id);
		return response()->json($oUser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
    }
	
	public function view()
	{	$users = User::all();
		$html = view('pages.configuracion.tabla_usuario', compact('view','users'))->render();
        return response()->json(compact('html'));
	}
	public function change_state(Request $request)
	{	$oUser = User::find($request->user_id);
		if($request->accion=="ACTIVAR")
			$oUser->estado="ACTIVO";
		if($request->accion=="INACTIVAR")
			$oUser->estado="INACTIVO";
		$oUser->save();
		return response()->json(array("result"=>"success","msg"=>"Todo OK","user_id"=>$oUser->id));
	}
	public function validate_username($username)
	{	if(!ctype_alpha($username))
			return response()->json(array("result"=>"error","msg"=>"Usuario inválido: Solo se aceptan letras [a-z]."));
		if(strlen($username)<6)
			return response()->json(array("result"=>"error","msg"=>"Usuario inválido: El nombre de usuario debe contener mínimo 6 letras."));
		if (User::where('username',$username)->count())
			return response()->json(array("result"=>"error","msg"=>"Usuario inválido: El nombre de usuario no está disponible."));
		return response()->json(array("result"=>"success","msg"=>"Nombre de usuario disponible."));
	}
	public function change_pass(Request $request)
	{	if (Hash::check($request->clave_actual, Auth::user()->password)) {
			if ($request->nueva_clave == $request->repita_clave){
				$user = User::find(Auth::user()->id);
				$user->password = bcrypt($request->nueva_clave);
				$user->save();
				Session::flash('result', 'success');
				Session::flash('message', 'La contraseña ha sido cambiada exitosamente.');
			}
			else{
				Session::flash('result', 'error');
				Session::flash('message', 'La confirmación de las contraseña no coinciden.');
			}
			
		}
		else{
			Session::flash('result', 'error');
			Session::flash('message', 'La contraseña actual ingresada no coincide.');
		}
		return Redirect::back();
	}
}
