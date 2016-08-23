<?php
class Fase4Controller extends BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
	}


	public function getIndex()
	{
		$remisiones=Fase3::where('Status','=','1')->get();
		return View::make('Fase4.index')->with('remisiones',$remisiones);
	}

	public function postFase4()
	{
		
		$existe=Fase4::where('NumeroRemision','=',Input::get('numremision'))->where('NumeroPedido','<>',Input::get('nopedido'))->first();
		if(is_null($existe))
		{
			$fase4=Fase4::where('NumeroPedido','=',Input::get('nopedido'))->first();
			if(is_null($fase4))
			{
			$fase4=new Fase4;
			}
			$terminafase=Input::get('terminafase');
			$fase4->NumeroRemision=Input::get('numremision');
			$fase4->NumeroPedido=Input::get('nopedido');
			if($terminafase=="on")
			{
				$fase4->Status=1;
			}
			else{
				$fase4->Status=0;
			}
			$fase4->autor=Auth::user()->login;
			$fase4->save();

			if($terminafase=="on")
			{
				$fase3=Fase3::find(Input::get('nopedido'));
				$fase3->Status=2;
				$fase3->save();
			}

			$seguimiento=new Seguimiento;
			$seguimiento->Comentarios=Input::get('observaciones');
			$seguimiento->NumeroPedido=Input::get('nopedido');
			$seguimiento->usuario=Auth::user()->login;
			$seguimiento->save();

			$remisiones=Fase3::where('Status','=','1')->get();
			if($terminafase=="on")
			{
				return Redirect::to('Fase4')->with('mensaje', '1');
			}else{
				return Redirect::to('Fase4')->with('mensaje', '3');
			}
		}else
		{
			return Redirect::to('Fase4')->with('mensaje', '2');
		}
	}
	public function getVerPedido($numeroPedido)
	{
		$dsn="conec";$usuario="";$clave=""; $cid=odbc_connect($dsn, $usuario, $clave);

		$consulta="SELECT MGW10008.CIDDOCUM01,MGW10010.CIDPRODU01,MGW10010.CUNIDADES,MGW10005.CCODIGOP01,MGW10005.CNOMBREP01 FROM MGW10008,MGW10010,MGW10005 WHERE MGW10008.CFOLIO=$numeroPedido and MGW10008.CSERIEDO01 like'%L%' and MGW10008.CIDDOCUM02=3 and MGW10010.CIDDOCUM01=MGW10008.CIDDOCUM01 AND MGW10005.CIDPRODU01=MGW10010.CIDPRODU01 AND MGW10005.ctipopro01=1";
		$result=odbc_exec($cid,$consulta)or die(exit("Error en odbc_exec"));
		$contador=0;
		$mensaje="";
		while($row=odbc_fetch_array($result))
		{
			$Unidades=odbc_result($result,"CUNIDADES");
			$Codigo=odbc_result($result,"CCODIGOP01");
			$nombre=odbc_result($result,"CNOMBREP01");

			$productoRevisado=ProductosRevisados::where("Codigo","=",$Codigo)->where('vendido','<',1);
			if($Unidades>$productoRevisado->count())
			{
				$mensaje.=$nombre." Revisadas: ".$productoRevisado->count()." Necesarias: ".$Unidades."<br>";
				$contador++;
			}

		}
		$pedido=Fase3::find($numeroPedido);
		if($contador>0)
		{
		return View::make('Fase4.verPedido')->with('pedido',$pedido)->with('mensaje',$mensaje);
		}else{
		return View::make('Fase4.verPedido')->with('pedido',$pedido);
		}
		
		

	}

	public function getVerRemision($numeroRemision)
	{
		$remision=Fase4::find($numeroRemision);
		return View::make('Fase4.verRemision')->with('remision',$remision);

	}

	public function buscaRemision()
	{
		set_time_limit(0);
		if(isset($_REQUEST['username'])) 
		{
			$pedido = $_REQUEST['username'];
			$dsn="conec";
			$usuario="";
			$clave="";
			$cid=odbc_connect($dsn, $usuario, $clave);
			try{

				$consulta="SELECT Ciddocum01 from mgw10008 where cfolio=$pedido AND ciddocum02=2";
				$result = odbc_exec($cid,$consulta);
					if($row=odbc_fetch_row($result))
						{
							$ciddocum=odbc_result($result,"Ciddocum01");
							$query="select cidmovim01 from mgW10010 where ciddocum01=$ciddocum";
							$result2 = odbc_exec($cid,$query);
								if($row=odbc_fetch_row($result2))
									{
										$cidmovim=odbc_result($result2,"cidmovim01");
										$query2="select cidDOCUM01 from mgW10010 where CIDMOVTO02=$cidmovim";
										$result3 = odbc_exec($cid,$query2);
										if($row=odbc_fetch_row($result3))
										{
											$ciddocum2=odbc_result($result3,"cidDOCUM01");
											$consulta2="SELECT cfolio from mgw10008 where ciddocum01=$ciddocum2 AND ciddocum02=3";
											$result4 = odbc_exec($cid,$consulta2);
											if($row=odbc_fetch_row($result4))
											{
												$folioremision=odbc_result($result4,"cfolio");
											}

										}
									}


						}

					if(isset($folioremision))
						echo $folioremision;
					else
						echo "No encontrado";
					}
			catch(Exception $e){
				echo "Error".$consulta;
			}

		}else{
			echo "No encontrado";
		}
	}

	public function getHistorial()
	{
		$remisiones=Fase4::where('autor','=',Auth::user()->login)->where("Status","=","2")->get();
		return View::make('Fase4.HistorialRemisiones')->with("remisiones",$remisiones);;
	}

	public function postHistorial()
	{
		
		
		$seguimiento=new Seguimiento;
		$seguimiento->Comentarios=Input::get('observaciones');
		$seguimiento->NumeroPedido=Input::get('nopedido');
		$seguimiento->usuario=Auth::user()->login;

		$seguimiento->save();

		return Redirect::to('Fase4/HistorialRemisiones')->with('mensaje', '1');

	}
}