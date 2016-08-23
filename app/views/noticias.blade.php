
<!DOCTYPE html>
<html lang="en-US" class="css3transitions">


<!-- Mirrored from newthemes.themeple.co/ausart_html/homepage6.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Feb 2016 18:07:51 GMT -->
<head>
    <meta charset="UTF-8" />
    <!-- Title -->
    <title>@if($tipoNoticia=="2")
                   Ingeniería aplicada
                    @elseif($tipoNoticia=="3")
                   Casos de éxito
                    @elseif($tipoNoticia=="4")
                   Expos
                @else
                 Noticias
                    @endif</title>
    <?php
    function getMetaKeywords($text) {
    // Limpiamos el texto
    $text = strip_tags($text);
    $text = strtolower($text);
    $text = trim($text);
    $text = preg_replace('/[^a-zA-Z0-9 -]/', ' ', $text);
    // extraemos las palabras
    $match = explode(" ", $text);
    // contamos las palabras
    $count = array();
    if (is_array($match)) {
        foreach ($match as $key => $val) {
            if (strlen($val) > 3) {
                if (isset($count[$val])) {
                    $count[$val]++;
                } else {
                    $count[$val] = 1;
                }
            }
        }
    }
    // Ordenamos los totales
    arsort($count);
    $count = array_slice($count, 0, 10);
    return implode(", ", array_keys($count));
}
function getMetaDescription($text) {
    $text = strip_tags($text);
    $text = trim($text);
    $text = substr($text, 0, 247);
    return $text."...";
}
    ?>
    <meta name="description" content="<?php echo getMetaDescription('agromg'); ?>" />
    <meta name="keywords" content="<?php echo getMetaKeywords('agromg'); ?>" />
    <!-- Responsive Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Pingback URL -->
    <link rel="pingback" href="xmlrpc.html" />
    <link rel="shortcut icon" type="image/x-icon" href="{{url('img/favicon.png')}}" />
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>

    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <![endif]-->
    <link rel='stylesheet' href='{{url('css/sss.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900%7COpen+Sans:300%7CIndie+Flower:regular%7COswald:300,regular,700&amp;subset=latin%2Clatin-ext' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url('/plugins/revslider/rs-plugin/css/settings.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans%3A100%2C400%2C300%2C500%2C600%2C700%2C300italic' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Satisfy' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url('css/style.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url('/css/bootstrap.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url('/css/bootstrap-responsive.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url('/css/odometer-theme-minimal.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url('/fancybox/source/jquery.fancybox.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url('/css/hoverex-all.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url('/css/vector-icons.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url('/css/font-awesome.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url('/css/linecon.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url('/css/steadysets.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url('/css/jquery.easy-pie-chart.css')}}' type='text/css' />
    <link rel='stylesheet' href='{{url('/css/idangerous.swiper.css')}}' type='text/css' />
    <link rel='stylesheet' href='{{url('/css/eldo.css')}}' type='text/css' />
    <link rel='stylesheet' href='{{url('/css/custom.css')}}' type='text/css' />
    <link rel='stylesheet' href='{{url('/plugins/js_composer/assets/css/js_composer.css')}}' type='text/css' />
    <link rel='stylesheet' href='{{url('/uploads/js_composer/custom.css')}}' type='text/css' />

    <script type='text/javascript' src='{{url('/plugins/LayerSlider/static/js/greensock.js')}}'></script>
    <script type='text/javascript' src='{{url('/includes/js/jquery/jquery.js')}}'></script>
    <script type='text/javascript' src='{{url('/includes/js/jquery/jquery-migrate.min.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/sss.js')}}'></script>
    <script type='text/javascript' src='{{url('/plugins/revslider/rs-plugin/js/jquery.themepunch.tools.min.js')}}'></script>
    <script type='text/javascript' src='{{url('/plugins/revslider/rs-plugin/js/jquery.themepunch.revolution.min.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/jquery.easy-pie-chart.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/jquery.appear.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/modernizr.custom.66803.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/odometer.min.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/animations.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/bootstrap.min.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/jquery.easing.1.1.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/jquery.easing.1.3.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/jquery.mobilemenu.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/isotope.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/layout-mode.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/masonry.pkgd.min.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/jquery.cycle.all.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/customSelect.jquery.min.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/jquery.flexslider-min.js')}}'></script>
    <script type='text/javascript' src='{{url('/fancybox/source/jquery.fancybox.js')}}'></script>
    <script type='text/javascript' src='{{url('/fancybox/source/helpers/jquery.fancybox-media.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/jquery.carouFredSel-6.1.0-packed.js')}}'></script>
    <script type='text/javascript' src='{{url('/js/tooltip.js')}}'></script>
    <script>
    jQuery(function($) {
        $('.slider').sss();
    });
    </script>
    

    <!--[if IE 8]><link rel="stylesheet" type="text/css" href="http://newthemes.themeple.co/ausart/assets/plugins/js_composer/assets/css/vc-ie8.css" media="screen"><![endif]-->
</head>
<!-- End of Header -->

<body class="page  page-template-default header_1_body fullwidth_slider_page with_slider_page wpb-js-composer js-comp-ver-4.3.5 vc_responsive">
   <div id="fb-root"></div>
   <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=1689550007950734";
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <!-- Used for boxed layout -->
  <!-- Start Top Navigation -->

        <!-- Header BEGIN -->
        @include('menuPagina')
        <?php crearMenu('');?>
        <div class="top_wrapper   no-transparent">
            <div class="header_page basic background_image colored_bg" style="background-image:url();background-repeat: no-repeat;background:#f6f6f6; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; color:#2f383d; ">
                <div class="container">
                    @if($tipoNoticia=="2")
                    <h1 class=" portfolio_big_title">Ingeniería aplicada</h1>
                    @elseif($tipoNoticia=="3")
                    <h1 class=" portfolio_big_title">Casos de éxito</h1>
                    @elseif($tipoNoticia=="4")
                    <h1 class=" portfolio_big_title">Expos</h1>
                    @else
                    <h1 class=" portfolio_big_title">Noticias</h1>
                    @endif

                    
                </div>
            </div>
                       <section id="content" class="normal" style=background:#ffffff>
             <div class="container" id="blog">
             <div class="row">
           <div class="span12">
            @foreach($noticias as $noticia)

                            <article id="post-3049" class="post-3049 post type-post status-publish format-standard has-post-thumbnail hentry category-new row-fluid blog-article v2 normal">
                            <div class="span12">
                                <div class="span6">
                                    <div class="media">
                                        <img src="{{$noticia->imagen}}" alt="">
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="content post_format_standart">
                                        <h1><a href="{{url('verNoticia/'.$noticia->idnoticia)}}">{{$noticia->titulo}}</a></h1>
                                        <ul class="info">
                                            <li>{{$noticia->updated_at}}</li>
                                        </ul>
                                        <div class="blog-content">
                                           <div class="read_more"> {{substr(strip_tags($noticia->contenido),0,900)}}... &nbsp;&nbsp;&nbsp;<a href="{{url('verNoticia/'.$noticia->idnoticia)}}" class="readmore">Leer más</a></div></div>
                                    </div>
                                </div>
                            </div>
                        </article>
                                 
            @endforeach
            </div>
                                 </div>
                                 </div>
                                  </section>

                           
                        
                    
               


                <div class="line_under">

                </div>
                <div class="line_under">
                </div>
                <div class="line_under">
                </div>
                <div class="line_under">
                </div>
                <div class="line_under">
                </div>
                <!-- Social Profiles -->
                <!-- Footer -->
            </div>
            <!-- Social Profiles -->
            <!-- Footer -->
            <div class="footer_wrapper">

                                    <footer id="footer" class="type_">
                                        <div class="inner">
                                            <div class="container">
                                                <div class="row-fluid ff">
                                                    <!-- widget -->
                                                    <div class="span5">
                                                        <div id="text-2" class="widget widget_text">
                                                            <h4 class="widget-title">Facebook</h4>
                                                            <div class="widget widget_tag_cloud">
                                                             <div class="fb-page" data-href="https://www.facebook.com/Campo-Competitivo-AgrOMG-214899215376460/" data-height="230" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="span3">
                                                    <div id="widget_contact_info-2" class="widget widget_contact_info">
                                                        <h4 class="widget-title">Información de contacto</h4>
                                                        <ul>
                                                            <li class="address"><i class="moon-location"></i><span>DIRECCIÓN:</span>
                                                                <br><span> Calle industria maderera 226-A<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Col. Industrial Zapopan norte<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zapopan, Jalisco</span></li>
                                                                <li class="email"><i class="moon-envelop"></i><span>EMAIL:</span>
                                                                    <br><span>omg@omg.com.mx</span></li>
                                                                    <li class="phone"><i class="moon-phone"></i><span>TELÉFONO:</span>
                                                                        <br><span>(33) 36166251 </span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="arrow_down"><i class="fa fa-caret-up"></i></div>
                                                </div>
                                                <div id="copyright">
                                                    <div class="container">
                                                        <div class="row-fluid">
                                                            <div class="span12 desc">
                                                                <div class="span6">
                                                                    <div id="text-3" class="widget widget_text">
                                                                        <div class="textwidget">COPYRIGHT © 2016 by OMG Internartional. Derechos Reservados.</div>
                                                                    </div>
                                                                </div>
                                                                <div class="span2"></div>
                                                                <div class="span4">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- #copyright -->
                                            </footer>
                                            <!-- #footer -->
                                        </div>
                                        <script type='text/javascript' src='{{url('/js/jquery.hoverex.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/js/imagesloaded.pkgd.min.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/js/jquery.parallax.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/js/jquery.cookie.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/js/main.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/includes/js/comment-reply.min.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/js/jquery.placeholder.min.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/js/jquery.livequery.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/js/jquery.countdown.min.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/js/waypoints.min.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/js/background-check.min.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/js/idangerous.swiper.min.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/js/jquery.infinitescroll.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/plugins/js_composer/assets/js/js_composer_front.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/includes/js/jquery/ui/core.min.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/includes/js/jquery/ui/widget.min.js')}}'></script>
                                        <script type='text/javascript' src='{{url('/includes/js/jquery/ui/accordion.min.js')}}'></script>
                                    </body>

                                    </html>
