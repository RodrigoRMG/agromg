
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

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                @if(isset($producto))
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1 ><i class="fa fa-plus"></i> <i class="fa fa-cube"></i> Agregar producto</h1>
                            </div>
                            <div class="panel-body">
                                <form action="{{url('Admin/actualizarProducto')}}" method="post" role="form">
                                    <input type="hidden" value="{{$producto->idproducto}}" name="idProducto">
                                    <div class="form-group">
                                     <label>Nombre del producto:</label>
                                     <input type="text" class="form-control" name="nombre" value="{{$producto->nombre}}" required>
                                 </div>
                                 <div class="form-group">
                                    <label>Descripción corta:</label>
                                    <textarea name="descripcionCorta" class="form-control" > {{$producto->descripcionCorta}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Descripción larga:</label>
                                    <textarea class="form-control" rows="10" name="descripcionLarga" required> {{$producto->descripcionLarga}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Imagen:</label>
                                    <input type="text" class="form-control" name="imagen"  value="{{$producto->imagen}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Video: </label><small>Solo el texto despues de v= ej. https://www.youtube.com/watch?v=<b>oIBTXw7QEug</b></small>
                                    <input type="text" class="form-control" name="video" value="{{$producto->video}}">
                                    
                                </div>
                                <small>Presiona <b>Ctrl</b> para seleccionar más de uno</small>
                                <div class="form-group">

                                    <label>Familia:</label>
                                    <select name="familia[]" class="form-control" multiple >

                                        @foreach($familias as $familia)
                                        <?php
                                        $string = $producto->familia;
                                        $what_to_find = $familia->idfamilia;
                                        if (preg_match('/\b' . $what_to_find . '\b/', $string)) { 
                                          echo '<option value="'.$familia->idfamilia.'" selected="selected">'.$familia->descripcion.'</option>';
                                      }else{
                                        echo '<option value="'.$familia->idfamilia.'">'.$familia->descripcion.'</option>';
                                    }
                                        ?>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Categoría:</label>
                                    <select name="categoria[]" class="form-control" multiple >

                                       @foreach($categorias as $categoria)
                                       <?php
                                       $string = $producto->categoria;
                                        $what_to_find = $categoria->idcategoria;
                                        if (preg_match('/\b' . $what_to_find . '\b/', $string)) { 
                                          echo '<option value="'.$categoria->idcategoria.'" selected="selected">'.$categoria->categoria.'</option>';
                                      }else{
                                        echo '<option value="'.$categoria->idcategoria.'">'.$categoria->categoria.'</option>';
                                    }
                                       ?>
                                       @endforeach
                                   </select>
                               </div>
                               <div class="form-group">
                                <label>Subcategoria:</label>
                                <select name="subcategoria[]" class="form-control" multiple >

                                   @foreach($subcategorias as $subcategoria)
                                    <?php
                                       $string = $producto->subcategoria;
                                        $what_to_find = $subcategoria->idSubcategoria;
                                        if (preg_match('/\b' . $what_to_find . '\b/', $string)) { 
                                          echo '<option value="'.$subcategoria->idSubcategoria.'" selected="selected">'.$subcategoria->descripcion.'</option>';
                                      }else{
                                        echo '<option value="'.$subcategoria->idSubcategoria.'">'.$subcategoria->descripcion.'</option>';
                                    }
                                       ?>
                                   @endforeach
                               </select>
                           </div>
                            <?php $funciones=Funcion::all();?>

               <div class="form-group">
                    <label>Función:</label>
                    <select name="funcion" class="form-control"  >

                       @foreach($funciones as $funcion)
                       @if($producto->funcion==$funcion->idfuncion)
                                 <option value="{{$funcion->idfuncion}}" selected>{{$funcion->nombre}}</option>
                                @else
                                   <option value="{{$funcion->idfuncion}}">{{$funcion->nombre}}</option>
                                @endif
                              
                     
                       @endforeach
                   </select>
               </div>
                           <div class="form-group">
                            <label>Empresa:</label>
                            <select name="empresa" class="form-control">
                                <option value="">Seleccione una opción....</option>
                                @foreach($empresas as $empresa)
                                @if($producto->empresa==$empresa->idempresa)
                                <option value="{{$empresa->idempresa}}" selected>{{$empresa->descripcion}}</option>
                                @else
                                  <option value="{{$empresa->idempresa}}">{{$empresa->descripcion}}</option>
                                @endif
                              
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-lg btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-lg-8 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 ><i class="fa fa-plus"></i> <i class="fa fa-cube"></i> Agregar producto</h1>
                </div>
                <div class="panel-body">
                    <form action="" method="post" role="form">
                        <div class="form-group">
                         <label>Nombre del producto:</label>
                         <input type="text" class="form-control" name="nombre" >
                     </div>
                     <div class="form-group">
                        <label>Descripción corta:</label>
                        <textarea name="descripcionCorta" class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Descripción larga:</label>
                        <textarea class="form-control" rows="10" name="descripcionLarga" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Imagen:</label>
                        <input type="text" class="form-control" name="imagen" required>
                    </div>
                    <div class="form-group">
                        <label>Video: </label><small>Solo el texto despues de v= ej. https://www.youtube.com/watch?v=<b>oIBTXw7QEug</b></small>
                        <input type="text" class="form-control" name="video">

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
               <?php $funciones=Funcion::all();?>

               <div class="form-group">
                    <label>Función:</label>
                    <select name="funcion" class="form-control" >

                       @foreach($funciones as $funcion)
                       <option value="{{$funcion->idfuncion}}">{{$funcion->nombre}}</option>
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
            <div class="modal-footer">
                <button type="submit" class="btn btn-lg btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endif
</div>

</div>

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
<script src="{{url('admin/js/editor-es.js')}}"></script>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>


<script type="text/javascript">
$(document).ready(function() {
    $('#tablaProductos').DataTable({
        responsive: true
    });
    tinymce.init({
      selector: 'textarea',
      language_url : '{{url("js/editor-es.js")}}',
      plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table contextmenu paste code'
      ],
      toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      content_css: [
      '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
      '//www.tinymce.com/css/codepen.min.css'
      ]
  });
});

</script>

</body>

</html>
