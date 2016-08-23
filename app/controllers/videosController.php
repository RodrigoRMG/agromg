<?php
class VideosController extends BaseController {

	public function __construct()
	{
		//$this->beforeFilter('auth');
	}


	public function getIndex()
	{
		$videos=Video::all();
		return View::make('admin.videos')->with('videos',$videos);
	}

	public function postAgregarVideo()
	{
		$descripcion=$_POST['descripcion'];
		$titulo=$_POST['titulo'];
		$video=$_POST['video'];

		$videoobjeto=new Video;
		$videoobjeto->descripcion=$descripcion;
		$videoobjeto->titulo=$titulo;
		$videoobjeto->video=$video;
		if($videoobjeto->save())
		{
			 return Redirect::to('Admin/Videos')->with('mensaje', '1');
		}else{
			 return Redirect::to('Admin/Videos')->with('mensaje', '2');
		}

	}

	public function eliminarVideo($id)
	{
		$video=Video::find($id);
		
		if($video->delete())
		{
			return Redirect::to('Admin/Videos')->with('mensaje', '3');
		}else{
			return Redirect::to('Admin/Videos')->with('mensaje', '4');
		}
	}

	public function verVideo($id)
	{
		$listaVideos=Video::where('idvideo','<>',$id)->get();
		$video=Video::find($id);
		return View::make('verVideo')->with('video',$video)->with('listaVideos',$listaVideos);
	}
}