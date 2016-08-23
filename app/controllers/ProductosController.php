<?php
class ProductosController extends BaseController {

	public function __construct()
	{
		//$this->beforeFilter('auth');
	}


	public function getIndex()
	{
		$productos=Producto::all();
		$categorias=Categoria::all();
		$subcategorias=Subcategoria::all();
		$familias=Familia::all();
		$empresas=Empresa::all();
		return View::make('admin.productos')->with('productos',$productos)->with('familias',$familias)->with('categorias',$categorias)->with('subcategorias',$subcategorias)->with('empresas',$empresas);
	}

	public function agregarProducto()
	{
		$categorias=Categoria::all();
		$subcategorias=Subcategoria::all();
		$familias=Familia::all();
		$empresas=Empresa::all();
		return View::make('admin.agregarProducto')->with('familias',$familias)->with('categorias',$categorias)->with('subcategorias',$subcategorias)->with('empresas',$empresas);
	}

	public function postAgregarProducto()
	{
		$nombre=$_POST['nombre'];
		$descripcionCorta=$_POST['descripcionCorta'];
		$descripcionLarga=$_POST['descripcionLarga'];
		$imagen=$_POST['imagen'];
		if(isset($_POST['familia']))
		{
			$familia=implode(',', $_POST['familia']);
		}else{
			$familia="";
		}
		if(isset($_POST['categoria']))
		{
			$categoria=implode(',', $_POST['categoria']);
		}else{
			$categoria="";
		}
		if(isset($_POST['subcategoria']))
		{
			$subcategoria=implode(',', $_POST['subcategoria']);
		}else{
			$subcategoria="";
		}
		
		$funcion=$_POST['funcion'];
		
		
		$empresa=$_POST['empresa'];
		$video=trim($_POST['video']);
		/*foreach(explode(',', $familia) as $fam)
		{
			echo $fam."<br>";
		}
		select * from producto where FIND_IN_SET(4,familia) 
		*/
		$producto=new Producto;
		$producto->nombre=$nombre;
		$producto->descripcionCorta=$descripcionCorta;
		$producto->descripcionLarga=$descripcionLarga;
		$producto->imagen=$imagen;
		$producto->familia=$familia;
		$producto->categoria=$categoria;
		$producto->subcategoria=$subcategoria;
		$producto->empresa=$empresa;
		$producto->video=$video;
		$producto->funcion=$funcion;

		if($producto->save())
		{
		   return Redirect::to('Admin/Productos')->with('mensaje', '1');
		}else{
		   return Redirect::to('Admin/Productos')->with('mensaje', '2');
		}
	}

	public function getActualizarProducto($id)
	{
		$categorias=Categoria::all();
		$subcategorias=Subcategoria::all();
		$familias=Familia::all();
		$empresas=Empresa::all();
		$producto=Producto::find($id);
		return View::make('admin.agregarProducto')->with('producto',$producto)->with('familias',$familias)->with('categorias',$categorias)->with('subcategorias',$subcategorias)->with('empresas',$empresas);

	}

	public function postActualizarProducto()
	{
		$idProducto=$_POST['idProducto'];
		$nombre=$_POST['nombre'];
		$descripcionCorta=$_POST['descripcionCorta'];
		$descripcionLarga=$_POST['descripcionLarga'];
		$imagen=$_POST['imagen'];
		$funcion=$_POST['funcion'];
		if(isset($_POST['familia']))
		{
			$familia=implode(',', $_POST['familia']);
		}else{
			$familia="";
		}
		if(isset($_POST['categoria']))
		{
			$categoria=implode(',', $_POST['categoria']);
		}else{
			$categoria="";
		}
		if(isset($_POST['subcategoria']))
		{
			$subcategoria=implode(',', $_POST['subcategoria']);
		}else{
			$subcategoria="";
		}
		$empresa=$_POST['empresa'];
		$video=trim($_POST['video']);
		/*foreach(explode(',', $familia) as $fam)
		{
			echo $fam."<br>";
		}
		select * from producto where FIND_IN_SET(4,familia) 
		*/
		$producto=Producto::find($idProducto);
		$producto->nombre=$nombre;
		$producto->descripcionCorta=$descripcionCorta;
		$producto->descripcionLarga=$descripcionLarga;
		$producto->imagen=$imagen;
		$producto->familia=$familia;
		$producto->categoria=$categoria;
		$producto->subcategoria=$subcategoria;
		$producto->empresa=$empresa;
		$producto->video=$video;
		$producto->funcion=$funcion;

		if($producto->save())
		{
		   return Redirect::to('Admin/Productos')->with('mensaje', '5');
		}else{
		   return Redirect::to('Admin/Productos')->with('mensaje', '6');
		}
	}

	public function eliminarProducto()
	{
		$idProducto=$_REQUEST['idProducto'];
		$producto=Producto::find($idProducto);
		
		if($producto->delete())
		{
			return Redirect::to('Admin/Productos')->with('mensaje', '3');
		}else{
			return Redirect::to('Admin/Productos')->with('mensaje', '4');
		}
	}

	public function filtrarProductos()
	{
		$results = Producto::where(function($query) {
               if(isset($_POST['empresa']))
		{
			$query->where('empresa','=',$_POST['empresa']);
		}

		if($_POST['txtbuscar']!="")
		{
			$query->where('nombre','like','%'.$_POST['txtbuscar'].'%')->orWhere('descripcionLarga','like','%'.$_POST['txtbuscar'].'%');
		}

		if(isset($_POST['familia']))
		{
			$query->whereRaw('FIND_IN_SET('.$_POST['familia'].',familia)');
		}
		if(isset($_POST['categoria']))
		{
			$query->whereRaw('FIND_IN_SET('.$_POST['categoria'].",categoria)");
		}
		if(isset($_POST['subcategoria']))
		{
			$query->whereRaw('FIND_IN_SET('.$_POST['subcategoria'].",subcategoria)");
		}
		if(isset($_POST['funcion']))
		{
			$query->where('funcion','=',$_POST['funcion']);
		}
           })->get();

		echo '<div class="wpb_row animate_onoffset  vc_row-fluid  animate_onoffset row-dynamic-el section-style    " style="padding-top: 0px !important; padding-bottom: 90px !important;">
                        <div class="container  dark">
                            <div class="section_clear">
                                <div class="vc_col-sm-12 wpb_column column_container" style="" data-animation="" data-delay="0">
                                    <div class="wpb_wrapper">
                                        <div class="dark_clients clients_el ">
                                            <div class="header">
                                                <h2>Resultados</h2></div>
                                                <section id="portfolio-preview-items" class="four-cols span12" data-nr="6">
                        <div class="row filterable">
                            <!-- Portfolio Normal Mode -->
                            <!-- item -->';
		foreach($results as $producto)
		{

                            echo '<div class="portfolio-item v1" >
                                <div class="he-wrap tpl2">
                                    <a href="'.url('verProducto/'.$producto->idproducto.'/'.str_replace(' ','-',$producto->nombre)).'" ><img src="'.$producto->imagen.'" alt=""></a>
                                    
                                  
                                </div>
                                 <div class="info">
                                    <p><b><a href="'.url('verProducto/'.$producto->idproducto.'/'.str_replace(' ','-',$producto->nombre)).'" >'.$producto->nombre.'</a></b><br>
                                        <font color="black">'.substr(strip_tags(trim($producto->descripcionCorta)),0,60).'...</font>
                                    </p>
                                    
                                   
                                </div>
                            </div>';

                        
		}
		echo '</div>

                    </section>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';

	}
}