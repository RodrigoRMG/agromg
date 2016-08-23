<?php
class ServiciosController extends BaseController {

	public function __construct()
	{
		//$this->beforeFilter('auth');
	}


	public function getIndex()
	{
		$servicios=Servicio::all();
		return View::make('admin.servicios')->with('servicios',$servicios);
	}

	public function getAgregarServicio()
	{
		
		return View::make('admin.agregarservicio');
	}

	public function postAgregarServicio()
	{
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$imagen=$_POST['imagen'];
		$empresas=implode(',', $_POST['empresas']);

		$servicio=new Servicio;
		$servicio->nombre=$nombre;
		$servicio->descripcion=$descripcion;
		$servicio->imagen=$imagen;
		$servicio->empresas=$empresas;
		if($servicio->save())
		{
			return Redirect::to('Admin/Servicios')->with('mensaje', '1');
		}else{
			return Redirect::to('Admin/Servicios')->with('mensaje', '2');
		}
	}

	public function elminarServicio($id)
	{
		$servicio=Servicio::find($id);
		$servicio->delete();
		return Redirect::to('Admin/Servicios');
	}

	public function getModificarServicio($id)
	{
		$servicio=Servicio::find($id);
		return View::make('admin.agregarServicio')->with('servicio',$servicio);
	}

	public function postModificarServicio()
	{
		$id=$_POST['idservicio'];
		$servicio=Servicio::find($id);
		
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$imagen=$_POST['imagen'];
		$empresas=implode(',', $_POST['empresas']);

		$servicio->nombre=$nombre;
		$servicio->descripcion=$descripcion;
		$servicio->imagen=$imagen;
		$servicio->empresas=$empresas;
		if($servicio->save())
		{
			return Redirect::to('Admin/Servicios')->with('mensaje', '1');
		}else{
			return Redirect::to('Admin/Servicios')->with('mensaje', '2');
		}
	}
}