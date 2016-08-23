
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
    <script type="text/javascript">
    function preguntar()
    {
      if(confirm('¿Está seguro que desea eliminar el producto?'))
      {
        return true;
      }else{
        return false;
      }
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

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <form role="form" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar usuario</h4>
      </div>
      <div class="modal-body">
      
             <div class="form-group">
                                    <label>Nombre del producto:</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>
                                <div class="form-group">
                                    <label>Descripción corta:</label>
                                    <textarea name="descripcionCorta" class="form-control" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Descripción larga:</label>
                                    <textarea class="form-control" name="descripcionLarga" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Imagen:</label>
                                    <input type="text" class="form-control" name="imagen" required>
                                </div>
                                 <div class="form-group">
                                    <label>Video: </label><small>Solo el texto despues de v= ej. https://www.youtube.com/watch?v=<b>oIBTXw7QEug</b></small>
                                    <input type="text" class="form-control" name="video" required>
                                    
                                </div>
                                <small>Presiona <b>Ctrl</b> para seleccionar más de uno</small>
                                <div class="form-group">

                                    <label>Familia:</label>
                                    <select name="familia[]" class="form-control" multiple >
                                       
                                        @foreach($familias as $familia)
                                        <option value="{{$familia->idfamilia}}">{{$familia->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>Categoría:</label>
                                    <select name="categoria[]" class="form-control" multiple >
                                        
                                         @foreach($categorias as $categoria)
                                        <option value="{{$categoria->idcategoria}}">{{$categoria->categoria}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>Subcategoria:</label>
                                    <select name="subcategoria[]" class="form-control" multiple >
                                       
                                         @foreach($subcategorias as $subcategoria)
                                        <option value="{{$subcategoria->idSubcategoria}}">{{$subcategoria->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Empresa:</label>
                                    <select name="empresa" class="form-control">
                                        <option value="">Seleccione una opción....</option>
                                         @foreach($empresas as $empresa)
                                        <option value="{{$empresa->idempresa}}">{{$empresa->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </div>
      </form>
    </div>
  </div>
</div>

        <div id="wrapper">

            <!-- Navigation -->
            @include('admin.menu')

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-cube"></i> Productos</h1>
                        <h1 align="right"><a class="btn btn-primary" href="{{url('Admin/agregarProducto')}}"><i class="fa fa-plus"></i> Agregar producto</a></h1><br>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        @if (Session::has('mensaje'))
                            @if(Session::get('mensaje')=='1')
                            <div class="alert alert-success">
                                El producto se guardó correctamente
                            </div>
                            @endif
                            @if(Session::get('mensaje')=='2')
                            <div class="alert alert-danger">
                                El producto no pudo ser guardado
                            </div>
                            @endif
                            @endif

                        <table class="table table-striped table-bordered table-hover" id="tablaProductos">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th></th>
                                <th>Descripción</th>
                                <th>Empresa</th>
                                <th>Familia</th>
                                <th>Categoría</th>
                                <th>SubCategoría</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr>
                                <td class="col-md-1">
                                    {{$producto->idproducto}}
                                </td>
                                <td  class="col-md-2">
                                    {{$producto->nombre}}
                                </td>
                                <td  class="col-md-1">
                                    <a href="#"><img src="{{$producto->imagen}}" width="50" height="56" alt="" title=""></a>
                                </td>
                                
                                <td  class="col-md-3">
                                    <p>{{$producto->descripcionCorta}}</p>
                                </td>
                                <?php
                                $empresa=Empresa::find($producto->empresa);
                                ?>
                                @if($empresa)
                                <td class="col-md-1">
                                    {{$empresa->descripcion}}
                                </td>
                                @else
                                <td class="col-md-1">
                                    Sin empresa
                                </td>
                                @endif
                                <?php
                                $familia=Familia::find($producto->familia);
                                ?>
                                <td class="col-md-1">
                                    {{$producto->familia}}
                                </td>
                                <?php
                                $Categoria=Categoria::find($producto->categoria);
                                ?>
                                <td class="col-md-1">
                                    {{$producto->categoria}}
                                </td>
                                <td class="col-md-1">
                                    {{$producto->subcategoria}}
                                </td>
                                <td class="col-md-2">
                                    <a class="btn btn-danger" <a class="btn btn-danger" href="eliminarProducto?idProducto={{$producto->idproducto}}" onClick="return preguntar()"><i class="fa fa-times"></i></a> <a target="_blank" href="{{url('Admin/actualizarProducto/')}}/{{$producto->idproducto}}" class="btn btn-success"><i class="fa fa-pencil"></i></a> <a target="_blank" href="{{url('verProducto/')}}/{{$producto->idproducto}}/{{str_replace(' ','-',$producto->nombre)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                </td>
                         </tr>
                            @endforeach
                            @if($productos->count()==0)
                            <tr><td colspan="7">No hay productos registrados</td></tr>
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
