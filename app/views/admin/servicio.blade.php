
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Familias</title>
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
    <script type="text/javascript">
    function preguntar()
    {
      if(confirm('¿Está seguro que desea eliminar la familia?'))
      {
        return true;
      }else{
        return false;
      }
    }
     function borrarDatos()
    {
      $('#modificarModal').removeData('bs.modal');
    }
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
       <div class="modal fade" id="modificarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" onClick="borrarDatos()">
      <div class="modal-dialog ">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              &times;</button>
              <h4 class="modal-title">Modificar familia </h4>
            </div>
            <div class="modal-body" id="bmodal">
              Cargando...
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>

        <div id="wrapper">

            <!-- Navigation -->
            @include('admin.menu')

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-book"></i> Servicios</h1>
                        <h1 align="right"><a href="{{url('Admin/agregarServicio')}}" class="btn btn-primary" ><i class="fa fa-plus"></i> Agregar servicio</a></h1><br>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                      @if (Session::has('mensaje'))
                            @if(Session::get('mensaje')=='1')
                            <div class="alert alert-success">
                                El servicio se guardó correctamente
                            </div>
                            @endif
                            @if(Session::get('mensaje')=='2')
                            <div class="alert alert-danger">
                                El servicio no pudo ser guardada
                            </div>
                            @endif
                            @endif
                        <table class="table table-striped table-bordered table-hover" id="tablaProductos">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($servicios as $servicio)
                            <tr>
                                <td class="col-md-1">
                                    {{$servicio->idfamilia}}
                                </td>
                                <td  class="col-md-2">
                                    {{$servicio->descripcion}}
                                </td>
                                <td class="col-md-2">
                                    <a class="btn btn-danger" <a class="btn btn-danger" href="eliminarFamilia?idFamilia={{$servicio->idfamilia}}" onClick="return preguntar()"><i class="fa fa-times"></i></a> <a onClick="return borrarDatos()" data-toggle="modal"  data-target="#modificarModal" href="{{url('Admin/modificarFamilia/'.$familia->idfamilia)}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                </td>
                         </tr>
                            @endforeach
                            @if($servicios->count()==0)
                            <tr><td colspan="4">No hay servicios registradas</td></tr>
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
