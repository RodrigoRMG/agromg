
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Agregar noticia</title>
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
                @if(isset($noticia))
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1 ><i class="fa fa-newspaper-o"></i> Modificar noticia</h1>
                            </div>
                            <div class="panel-body">
                                <form action="{{url('Admin/modificarNoticia')}}" method="post" role="form">
                                    <input type="hidden" value="{{$noticia->idnoticia}}" name="idnoticia">
                                    <div class="form-group">
                                     <label>título:</label>
                                     <input type="text" class="form-control" name="titulo" value="{{$noticia->titulo}}" required>
                                 </div>
                                <div class="form-group">
                                    <label>Contenido:</label>
                                    <textarea class="form-control" rows="10" name="contenido" required> {{$noticia->contenido}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Imagen:</label>
                                    <input type="text" class="form-control" name="imagen"  value="{{$noticia->imagen}}" required>
                                </div>
                                <div class="form-group">

                                    <label>Tipo:</label>
                                    <select name="tipo" class="form-control"  required>
                                      @if($noticia->tipoNoticia==1)
                                      <option value="1" selected>Noticia</option>
                                      @else
                                      <option value="1">Noticia</option>
                                      @endif
                                      @if($noticia->tipoNoticia==2)
                                      <option value="2" selected>Ingeniería aplicada</option>
                                      @else
                                       <option value="2">Ingeniería aplicada</option>
                                      @endif
                                      @if($noticia->tipoNoticia==3)
                                      <option value="3" selected>Casos de éxito</option>
                                      @else
                                      <option value="3">Casos de éxito</option>
                                      @endif
                                      @if($noticia->tipoNoticia==4)
                                      <option value="4" selected>Expos</option>
                                      @else
                                      <option value="4">Expos</option>
                                      @endif
                                     
                                      
                                      
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
                                <h1 ><i class="fa fa-newspaper-o"></i> Agregar Noticia</h1>
                            </div>
                            <div class="panel-body">
                                <form action="" method="post" role="form">

                                    <div class="form-group">
                                     <label>Título:</label>
                                     <input type="text" class="form-control" name="titulo"  required>
                                 </div>
                                <div class="form-group">
                                    <label>Contenido:</label>
                                    <textarea class="form-control" rows="15" name="contenido" required> </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Imagen:</label>
                                    <input type="text" class="form-control" name="imagen"   required>
                                </div>
                                <div class="form-group">

                                    <label>Tipo:</label>
                                    <select name="tipo" class="form-control"  required>
                                      <option value="1">Noticia</option>
                                      <option value="2">Ingeniería aplicada</option>
                                      <option value="3">Casos de éxito</option>
                                      <option value="4">Expos</option>
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
