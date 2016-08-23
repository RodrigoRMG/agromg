<?php
class SubcategoriasController extends BaseController {

	public function __construct()
	{
		//$this->beforeFilter('auth');
	}


	public function getIndex()
	{
		$subcategorias=Subcategoria::all();
		return View::make('admin.subcategorias')->with('subcategorias',$subcategorias);
	}

	public function postAgregarSubcategoria()
	{
		$descripcion=$_POST['descripcion'];

		$subcategoria=new Subcategoria;
		$subcategoria->descripcion=$descripcion;
		if($subcategoria->save())
		{
			 return Redirect::to('Admin/Subcategorias')->with('mensaje', '1');
		}else{
			 return Redirect::to('Admin/Subcategorias')->with('mensaje', '2');
		}

	}
		public function modificarSubcategoria($id)
	{
		$Subcategoria=Subcategoria::find($id);
		if($Subcategoria)
		{
			$respuesta=' 
      <form role="form" method="post" action="'.url('Admin/modificarSubcategoria').'">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="borrarDatos()"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Moficar Subcategoria</h4>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="idSubcategoria" value="'.$Subcategoria->idSubcategoria.'">
            <div class="form-group">
                <label>Descripción de la Subcategoria</label>
                <textarea name="descripcion" class="form-control" required>'.$Subcategoria->descripcion.'</textarea>
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
	public function postModificarSubcategoria()
	{
		$id=$_REQUEST['idSubcategoria'];
		$descripcion=$_REQUEST['descripcion'];
		$Subcategoria=Subcategoria::find($id);
		if($Subcategoria)
		{
			$Subcategoria->descripcion=$descripcion;
			if($Subcategoria->save())
			{
				return Redirect::to('Admin/Subcategorias')->with('mensaje', '5');
			}else{
				return Redirect::to('Admin/Subcategorias')->with('mensaje', '6');
			}
		}else{
			return Redirect::to('Admin/Subcategorias')->with('mensaje', '6');
		}

	}

	public function eliminarSubcategoria()
	{
		$idsubcategoria=$_REQUEST['idSubcategoria'];
		$subcategoria=Subcategoria::find($idsubcategoria);
		
		if($subcategoria->delete())
		{
			return Redirect::to('Admin/Subcategorias')->with('mensaje', '3');
		}else{
			return Redirect::to('Admin/Subcategorias')->with('mensaje', '4');
		}
	}
}