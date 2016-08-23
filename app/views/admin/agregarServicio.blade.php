
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Agregar Servicio</title>
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
                @if(isset($servicio))
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1 ><i class="fa fa-gears"></i> Modificar servicio</h1>
                            </div>
                            <div class="panel-body">
                                <form action="{{url('Admin/modificarServicio')}}" method="post" role="form">
                                    <input type="hidden" value="{{$servicio->idservicio}}" name="idservicio">
                                    <div class="form-group">
                                     <label>Nombre:</label>
                                     <input type="text" class="form-control" name="nombre" value="{{$servicio->nombre}}" required>
                                 </div>
                                <div class="form-group">
                                    <label>Descripción:</label>
                                    <textarea class="form-control" rows="10" name="descripcion" required> {{$servicio->descripcion}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Imagen:</label>
                                    <input type="text" class="form-control" name="imagen"  value="{{$servicio->imagen}}" required>
                                </div>
                                <?php
                                $empresas=Empresa::all();

                                ?>
                                  <div class="form-group">
                                <select name="empresas[]" class="form-control" multiple required>
                                @foreach($empresas as $empresa)
                               <?php
                                       $string = $servicio->empresas;
                                        $what_to_find = $empresa->idempresa;
                                        if (preg_match('/\b' . $what_to_find . '\b/', $string)) { 
                                          echo '<option value="'.$empresa->idempresa.'" selected="selected">'.$empresa->descripcion.'</option>';
                                      }else{
                                        echo '<option value="'.$empresa->idempresa.'">'.$empresa->descripcion.'</option>';
                                    }
                                       ?>
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
                    <div class="col-lg-12 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1 ><i class="fa fa-gears"></i> Agregar servicio</h1>
                            </div>
                            <div class="panel-body">
                                <form action="" method="post" role="form">

                                    <div class="form-group">
                                     <label>Nombre:</label>
                                     <input type="text" class="form-control" name="nombre"  required>
                                 </div>
                                <div class="form-group">
                                    <label>descripción:</label>
                                    <textarea class="form-control" rows="15" name="descripcion" required> </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Imagen:</label>
                                    <input type="text" class="form-control" name="imagen"   required>
                                </div>
                                <?php
                                $empresas=Empresa::all();

                                ?>
                                  <div class="form-group">
                                <select name="empresas[]" class="form-control" multiple required>
                                @foreach($empresas as $empresa)
                                <option value="{{$empresa->idempresa}}" >{{$empresa->descripcion}}</option>
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
