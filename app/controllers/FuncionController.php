<?php
class FuncionController extends BaseController {

	public function __construct()
	{
		//$this->beforeFilter('auth');
	}


	public function getIndex()
	{
			$funciones=Funcion::all();
		return View::make('admin.funcion')->with('funciones',$funciones);
	}

	public function postFuncion()
	{
		$descripcion=$_POST['descripcion'];

		$funcion=new Funcion;
		$funcion->nombre=$descripcion;
		if($funcion->save())
		{
			 return Redirect::to('Admin/Funcion')->with('mensaje', '1');
		}else{
			 return Redirect::to('Admin/Funcion')->with('mensaje', '2');
		}

	}


	

}