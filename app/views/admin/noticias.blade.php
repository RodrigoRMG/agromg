
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Productos</title>
    <link href="https://www.laptopmexico.com/design/backend/media/images/favicon.ico" rel="shortcut icon">
    <!-- Bootstrap Core CSS -->
    <link href="{{url('admin/css/bootstrap.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('admin/css/metisMenu.min.css')}}" rel="stylesheet">

     <link href="{{url('admin/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    

    <!-- Timeline CSS -->
    <link href="{{url('admin/css/timeline.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('admin/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{url('admin/css/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            @include('admin.menu')

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-newspaper-o"></i> Noticias</h1>
                        <h1 align="right"><a href="{{url('Admin/agregarNoticia')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Noticia</a></h1><br>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                          @if (Session::has('mensaje'))
                            @if(Session::get('mensaje')=='1')
                            <div class="alert alert-success">
                                La noticia se guardó correctamente
                            </div>
                            @endif
                            @if(Session::get('mensaje')=='2')
                            <div class="alert alert-danger">
                                La noticia no pudo ser guardada
                            </div>
                            @endif
                            @endif
                        <table class="table table-striped table-bordered table-hover" id="tablaProductos">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Titulo</td>
                                <td>Contenido</td>
                                <td>Fecha</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                             @if($noticias)
                             @foreach($noticias as $noticia)
                             <tr>
                                <td>{{$noticia->idnoticia}}</td>
                                <td>{{$noticia->titulo}}</td>
                                <td>{{substr(strip_tags($noticia->contenido),0,30)}}...</td>
                                <td>{{$noticia->created_at}}</td>
                                <td><a class="btn btn-danger"  href="eliminarNoticia/{{$noticia->idnoticia}}" onClick="return preguntar()"><i class="fa fa-times"></i></a> <a href="{{url('Admin/modificarNoticia/'.$noticia->idnoticia)}}" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>
                             </tr>
                             @endforeach
                             @endif
                     </tbody>
                     </table>
                 </div>
             </div>
         </div>
         <!-- /.row -->
         <!-- /.row -->
     </div>
     <!-- /#page-wrapper -->

 </div>
 <!-- /#wrapper -->

 <!-- jQuery -->
 <script src="{{url('admin/js/jquery.js')}}"></script>

 <!-- Bootstrap Core JavaScript -->
 <script src="{{url('admin/js/bootstrap.min.js')}}"></script>

 <!-- Metis Menu Plugin JavaScript -->
 <script src="{{url('admin/js/metisMenu.js')}}"></script>

 <!-- Morris Charts JavaScript -->
 <script src="{{url('admin/js/raphael-min.js')}}"></script>
 <script src="{{url('admin/js/morris.js')}}"></script>

 <!-- Custom Theme JavaScript -->
 <script src="{{url('admin/js/sb-admin-2.js')}}"></script>

  <script src="{{url('admin/js/jquery.dataTables.min.js')}}"></script> 
  <script src="{{url('admin/js/dataTables.bootstrap.min.js')}}"></script>


  <script type="text/javascript">
  $(document).ready(function() {
        $('#tablaProductos').DataTable({
                responsive: true
        });
    });

  </script>

</body>

</html>
