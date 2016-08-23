
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Categorías</title>
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

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar usuario</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="post">
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="nombre" class="form-control">
            </div>
            <div class="form-group">
                <label>Nombres</label>
                <input type="text" name="nombre" class="form-control">
            </div>
            <div class="form-group">
                <label>Apellidos</label>
                <input type="text" name="nombre" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="nombre" class="form-control">
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="text" name="nombre" class="form-control">
            </div>
            <div class="form-group">
                <label>Repetir contraseña</label>
                <input type="text" name="nombre" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>

        <div id="wrapper">

            <!-- Navigation -->
            @include('admin.menu')

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-users"></i> Usuarios</h1>
                        <h1 align="right"><a class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Agregar usuario</a></h1><br>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <table class="table table-striped table-bordered table-hover" id="tablaProductos">
                            <thead>
                            <tr>
                                <td></td>
                                <td>Usuario</td>
                                <td>Nombres</td>
                                <td>Apellidos</td>
                                <td>EMail</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-md-1">
                                    <input type="checkbox" name="product_ids[]" value="13416">
                                </td>
                                <td class="col-md-2">
                                    juan
                                </td>
                                <td  class="col-md-2">
                                    Juan
                                </td>
                                <td  class="col-md-3">
                                    Pérez
                                </td>
                                <td  class="col-md-3">
                                    Juan@hotmail.com
                                </td>
                                
                                <td class="col-md-1">
                                    <a class="btn btn-danger" href="#"><i class="fa fa-times"></i></a> <a href="#" class="btn btn-success"><i class="fa fa-pencil"></i></a> 
                                </td>
                         </tr>
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
