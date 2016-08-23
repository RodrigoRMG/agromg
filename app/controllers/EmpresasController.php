<?php
class EmpresasController extends BaseController {

	public function __construct()
	{
		//$this->beforeFilter('auth');
	}


	public function getIndex()
	{
		$empresas=Empresa::all();
		return View::make('admin.empresas')->with('empresas',$empresas);
	}

	public function postAgregarEmpresa()
	{
		$descripcion=$_POST['descripcion'];
		$imagen=$_POST['imagen'];
		$texto=$_POST['texto'];
		$imagenOver=$_REQUEST['imagenOver'];

		$empresa=new Empresa;
		$empresa->descripcion=$descripcion;
		$empresa->imagen=$imagen;
		$empresa->texto=$texto;
		$empresa->imagenOver=$imagenOver;

		if($empresa->save())
		{
			 return Redirect::to('Admin/Empresas')->with('mensaje', '1');
		}else{
			 return Redirect::to('Admin/Empresas')->with('mensaje', '2');
		}

	}

		public function modificarEmpresa($id)
	{
		$empresa=Empresa::find($id);
		if($empresa)
		{
			$respuesta=' 
      <form role="form" method="post" action="'.url('Admin/modificarEmpresa').'">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="borrarDatos()"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar empresa</h4>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="idempresa" value="'.$empresa->idempresa.'">
            <div class="form-group">
                <label>Descripción de la empresa</label>
                <textarea name="descripcion" class="form-control" required>'.$empresa->descripcion.'</textarea>
            </div>
            <div class="form-group">
                <label>Historia</label>
                <textarea name="texto" class="form-control" required>'.$empresa->texto.'</textarea>
            </div>
            <div class="form-group">
                <label>Imagen</label>
                <input type="text" name="imagen" class="form-control" value="'.$empresa->imagen.'" required>
            </div>
            <div class="form-group">
                <label>Imagen over</label>
                <input type="text" name="imagenOver" class="form-control" value="'.$empresa->imagenOver.'" required>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="borrarDatos()">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>';
		}else{
			$respuesta=' 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="borrarDatos()"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Error</h4>
      </div>
      <div class="modal-body">
      El recurso solicitado no se encuentra disponible.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="borrarDatos()">Cerrar</button>
      </div>';

		}
		return $respuesta;

	}
	public function postModificarEmpresa()
	{
		$id=$_REQUEST['idempresa'];
		$descripcion=$_REQUEST['descripcion'];
		$imagen=$_REQUEST['imagen'];
		$texto=$_REQUEST['texto'];
		$imagenOver=$_REQUEST['imagenOver'];
		$empresa=Empresa::find($id);
		if($empresa)
		{
			$empresa->descripcion=$descripcion;
			$empresa->imagen=$imagen;
			$empresa->texto=$texto;
			$empresa->imagenOver=$imagenOver;
			if($empresa->save())
			{
				return Redirect::to('Admin/Empresas')->with('mensaje', '5');
			}else{
				return Redirect::to('Admin/Empresas')->with('mensaje', '6');
			}
		}else{
			return Redirect::to('Admin/Empresas')->with('mensaje', '6');
		}

	}

	public function eliminarEmpresa()
	{
		$idEmpresa=$_REQUEST['idEmpresa'];
		$empresa=Empresa::find($idEmpresa);
		
		if($empresa->delete())
		{
			return Redirect::to('Admin/Empresas')->with('mensaje', '3');
		}else{
			return Redirect::to('Admin/Empresas')->with('mensaje', '4');
		}
	}

	

}