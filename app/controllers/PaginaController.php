<?php
class PaginaController extends BaseController {

	public function __construct()
	{
		//$this->beforeFilter('auth');
	}


	public function getIndex()
	{
		$empresas=Empresa::all();
		return View::make('index')->with('empresas',$empresas);
	}
	public function marcas()
	{
		$empresas=Empresa::all();
		if(isset($_REQUEST['marca']))
		{
			$marca=$_REQUEST['marca'];
			$empresa=Empresa::find($marca);
			if($empresa)
			{
				$productos=Producto::where('empresa','=',$empresa->idempresa)->get();
				return View::make('marcas')->with('empresa',$empresa)->with('productos',$productos);
			}else{
				return View::make('marcas')->with('empresas',$empresas);
			}
		}else{
			return View::make('marcas')->with('empresas',$empresas);
		}
		
		
	}

	public function productos()
	{
		$familias=Familia::all();
		return View::make('productos')->with('familias',$familias);
	}
	public function verProducto($id,$nombre)
	{
		
		$producto=Producto::find($id);
		return View::make('verProducto')->with('producto',$producto);
	}
	public function Servicios()
	{
		$servicios=Servicio::all();
		return View::make('Servicios')->with('servicios',$servicios);
	}

	public function verServicio($id)
	{
		$servicio=Servicio::find($id);
		return View::make('verServicio')->with('servicio',$servicio);
	
	}
	public function areaNegocios()
	{
		return View::make('areaNegocios');
	}

	public function videos()
	{
		$videos=Video::all();
		return View::make('videos')->with('videos',$videos);
	}
	public function getContacto()
	{
		return View::make('contacto');
	}

	public function galeria()
	{
		$imagenes=Galeria::all();
		return View::make('admin.galeria')->with('imagenes',$imagenes);
	}

	public function postGaleria()
	{
		$nuevaImagen=$_POST['imagen'];
		$descripcion=$_POST['descripcion'];

		$imagen=new Galeria;
		$imagen->descripcion=$descripcion;
		$imagen->imagen=$nuevaImagen;
		if($imagen->save())
		{
			 return Redirect::to('Admin/Galeria')->with('mensaje', '1');
		}else{
			 return Redirect::to('Admin/Galeria')->with('mensaje', '1');
		}
	}

	public function eliminarImagen($id)
	{
		$imagen=Galeria::find($id);
		if($imagen->delete())
		{
			 return Redirect::to('Admin/Galeria')->with('mensaje', '3');
		}else{
			 return Redirect::to('Admin/Galeria')->with('mensaje', '4');
		}
	}

	public function getNoticias($tipo)
	{
		$noticias=Noticia::where('tipoNoticia','=',$tipo)->get();
		return View::make('noticias')->with('noticias',$noticias)->with('tipoNoticia',$tipo);
	}

	public function getPlantaBeneficio($id)
	{
		$productos=Producto::where('subcategoria','=',9)->where('categoria','=',$id)->get();
		$categoria=Categoria::find($id);
		return View::make('plantasBeneficio')->with('productos',$productos)->with('categoria',$categoria);
	}

	public function getBusqueda()
	{
		if(isset($_REQUEST['q']))
		{
			$buscar=$_REQUEST['q'];
			$productos=Producto::where('nombre','like','%'.$buscar.'%')->orWhere('descripcionCorta','like','%'.$buscar.'%')->orWhere('descripcionLarga','like','%'.$buscar.'%')->get();
			$empresas=Empresa::where('descripcion','like','%'.$buscar.'%')->get();
			return View::make('busqueda')->with('productos',$productos)->with('empresas',$empresas)->with('buscado',$buscar);
		}else{
			return Redirect::to('/');
		}
	}

	public function verNoticia($id)
	{
		$noticia=Noticia::find($id);
		return View::make('verNoticia')->with('noticia',$noticia);
	}

	public function enviarMensaje()
	{
	  set_time_limit(0);
      require('mail/class.phpmailer.php');
      require('mail/class.smtp.php');
      $destino=$_REQUEST['destino'];
      $empresa=$_REQUEST['empresa'];
      $email=$_REQUEST['email'];
      $telefono=$_REQUEST['telefono'];
      $nombre=$_REQUEST['nombre'];
      $asunto=$_REQUEST['asunto'];
      $mensajePagina=$_REQUEST['mensaje'];
      $mensaje="";
      $empresaomg="";

      $mail = new PHPMailer();
      $mail->IsSMTP(); 
      $mail->Host = "smtp.gmail.com";
      $mail->Port = 587;
      $mail->SMTPSecure = 'tls';
      $mail->From = "notificaciones@agromg.net";
      $mail->FromName = "Pagina AGROMG";
      $mail->Subject = "Nuevo mensaje";
      $mail->AltBody = "Nuevo mensaje"; 
      if($destino==1)
      {
      	$mensaje="Una persona quiere contactar al area de ventas, sus datos son los siguientes: <br>";
      	$mensaje.="Empresa:".$empresa;
      	$mensaje.="<br>Nombre:".$nombre;
      	$mensaje.="<br>Asunto:".$asunto;
      	$mensaje.="<br>Telefono:".$telefono;
      	$mensaje.="<br>Email:".$email;
      	$mensaje.="<br>Mensaje:".$mensajePagina;
      	$empresaomg="ventas@agromg.com";
      }else{
      	$mensaje="Una persona quiere contactar al area de Ingenieria, sus datos son los siguientes: <br>";
      	$mensaje.="Empresa:".$empresa;
      	$mensaje.="<br>Nombre:".$nombre;
      	$mensaje.="<br>Asunto:".$asunto;
      	$mensaje.="<br>Telefono:".$telefono;
      	$mensaje.="<br>Email:".$email;
      	$mensaje.="<br>Mensaje:".$mensajePagina;
      	$empresaomg="ingenieria@agromg.com";

      }


      $mail->MsgHTML($mensaje);
      $mail->AddAddress($empresaomg);
      $mail->SMTPAuth = true;
      $mail->Username = "generico@omg.com.mx";
      $mail->Password = "simon469"; 

      $errorMensaje=0;
      $enviado=$mail->Send();
      if(!$enviado) {
        $errorMensaje++;
      } 
      if($errorMensaje>0)
      {
        return Redirect::to('Contacto')->with('mensaje', '1');
      }else{
      	return Redirect::to('Contacto')->with('mensaje', '1');
      }
	}
}