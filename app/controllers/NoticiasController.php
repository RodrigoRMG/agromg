<?php
class NoticiasController extends BaseController {

	public function __construct()
	{
		//$this->beforeFilter('auth');
	}


	public function getIndex()
	{
		$noticias=Noticia::all();
		return View::make('admin.noticias')->with('noticias',$noticias);
	}

	public function getAgregarNoticia()
	{
		
		return View::make('admin.agregarNoticia');
	}

	public function postAgregarNoticia()
	{
		$titulo=$_POST['titulo'];
		$contenido=$_POST['contenido'];
		$imagen=$_POST['imagen'];
		$tipo=$_POST['tipo'];

		$noticia=new Noticia;
		$noticia->titulo=$titulo;
		$noticia->contenido=$contenido;
		$noticia->imagen=$imagen;
		$noticia->tipoNoticia=$tipo;
		if($noticia->save())
		{
			return Redirect::to('Admin/Noticias')->with('mensaje', '1');
		}else{
			return Redirect::to('Admin/Noticias')->with('mensaje', '2');
		}
	}

	public function elminarNoticia($id)
	{
		$noticia=Noticia::find($id);
		$noticia->delete();
		return Redirect::to('Admin/Noticias');
	}

	public function getModificarNoticia($id)
	{
		$noticia=Noticia::find($id);
		return View::make('admin.agregarNoticia')->with('noticia',$noticia);
	}

	public function postModificarNoticia()
	{
		$id=$_POST['idnoticia'];
		$noticia=Noticia::find($id);
		
		$titulo=$_POST['titulo'];
		$contenido=$_POST['contenido'];
		$imagen=$_POST['imagen'];
		$tipo=$_POST['tipo'];

		$noticia->titulo=$titulo;
		$noticia->contenido=$contenido;
		$noticia->imagen=$imagen;
		$noticia->tipoNoticia=$tipo;
		$noticia->save();
		return Redirect::to('Admin/Noticias');
	}
}