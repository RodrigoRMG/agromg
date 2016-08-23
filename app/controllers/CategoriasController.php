<?php
class CategoriasController extends BaseController {

	public function __construct()
	{
		//$this->beforeFilter('auth');
	}


	public function getIndex()
	{
		$categorias=Categoria::all();
		return View::make('admin.categorias')->with('categorias',$categorias);
	}

	public function postAgregarCategoria()
	{
		$descripcion=$_POST['descripcion'];

		$categoria=new Categoria;
		$categoria->categoria=$descripcion;
		if($categoria->save())
		{
			 return Redirect::to('Admin/Categorias')->with('mensaje', '1');
		}else{
			 return Redirect::to('Admin/Categorias')->with('mensaje', '2');
		}

	}
		public function modificarCategoria($id)
	{
		$categoria=Categoria::find($id);
		if($categoria)
		{
			$respuesta=' 
      <form role="form" method="post" action="'.url('Admin/modificarCategoria').'">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="borrarDatos()"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar categoria</h4>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="idcategoria" value="'.$categoria->idcategoria.'">
            <div class="form-group">
                <label>Descripción de la categoria</label>
                <textarea name="categoria" class="form-control" required>'.$categoria->categoria.'</textarea>
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
	public function postModificarCategoria()
	{
		$id=$_REQUEST['idcategoria'];
		$descripcion=$_REQUEST['categoria'];
		$categoria=Categoria::find($id);
		if($categoria)
		{
			$categoria->categoria=$descripcion;
			if($categoria->save())
			{
				return Redirect::to('Admin/Categorias')->with('mensaje', '5');
			}else{
				return Redirect::to('Admin/Categorias')->with('mensaje', '6');
			}
		}else{
			return Redirect::to('Admin/Categorias')->with('mensaje', '6');
		}

	}

	public function eliminarCategoria()
	{
		$idcategoria=$_REQUEST['idCategoria'];
		$categoria=Categoria::find($idcategoria);
		
		if($categoria->delete())
		{
			return Redirect::to('Admin/Categorias')->with('mensaje', '3');
		}else{
			return Redirect::to('Admin/Categorias')->with('mensaje', '4');
		}
	}
}