<?php
class FamiliasController extends BaseController {

	public function __construct()
	{
		//$this->beforeFilter('auth');
	}


	public function getIndex()
	{
		$familias=Familia::all();
		return View::make('admin.familias')->with('familias',$familias);
	}
	public function postAgregarFamilia()
	{
		$descripcion=$_POST['descripcion'];
		$imagen=$_POST['imagen'];

		$familia=new Familia;
		$familia->descripcion=$descripcion;
		$familia->imagen=$imagen;
		if($familia->save())
		{
			 return Redirect::to('Admin/Familias')->with('mensaje', '1');
		}else{
			 return Redirect::to('Admin/Familias')->with('mensaje', '2');
		}

	}

	public function modificarFamilia($id)
	{
		$familia=Familia::find($id);
		if($familia)
		{
			$respuesta=' 
      <form role="form" method="post" action="'.url('Admin/modificarFamilia').'">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="borrarDatos()"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar familia</h4>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="idfamilia" value="'.$familia->idfamilia.'">
            <div class="form-group">
                <label>Descripción de la familia</label>
                <textarea name="descripcion" class="form-control" required>'.$familia->descripcion.'</textarea>
            </div>
            <div class="form-group">
                <label>Imagen</label>
                <input type="text" name="imagen" class="form-control" value="'.$familia->imagen.'" required>
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
	public function postModificarFamilia()
	{
		$id=$_REQUEST['idfamilia'];
		$descripcion=$_REQUEST['descripcion'];
		$imagen=$_REQUEST['imagen'];
		$familia=Familia::find($id);
		if($familia)
		{
			$familia->descripcion=$descripcion;
			$familia->imagen=$imagen;
			if($familia->save())
			{
				return Redirect::to('Admin/Familias')->with('mensaje', '5');
			}else{
				return Redirect::to('Admin/Familias')->with('mensaje', '6');
			}
		}else{
			return Redirect::to('Admin/Familias')->with('mensaje', '6');
		}

	}

	public function eliminarFamilia()
	{
		$idfamilia=$_REQUEST['idFamilia'];
		$familia=Familia::find($idfamilia);
		
		if($familia->delete())
		{
			return Redirect::to('Admin/Familias')->with('mensaje', '3');
		}else{
			return Redirect::to('Admin/Familias')->with('mensaje', '4');
		}
	}

}