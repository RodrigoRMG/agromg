        <?php

        function crearMenu($menu)
        {

            ?>
               <div class="top_nav">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <div class="pull-left">
                        <div id="widget_topnav-2" class="widget widget_topnav">
                            <div class="login small_widget">
                                <div class="widget_activation"><a href="{{url('/')}}" >Bienvenido a AGROMG</a></div>
                                    </div>
                                </div>
                                <div id="widget_topinfo-2" class="widget widget_topinfo">
                                    <div class="topinfo"><span class="phone"><i class="moon-phone"></i>+52(33) 3616-6251</span><span class="email"><i class="icon-envelope"></i>agro@omg.com.mx </span></div>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="pull-right">
                                <div id="social_widget-2" class="widget social_widget">
                                    <div class="row-fluid social_row">
                                        <div class="span12">
                                            <ul class="footer_social_icons">
                                                <li class="youtube"><a href="https://www.youtube.com/user/agromg123" target="_blank"><img width="25" height="25" src="{{url('img/1.png')}}"></a></li>
                                                <li class="twitter"><a href="https://twitter.com/agromg" target="_blank"><img width="25" height="25" src="{{url('img/2.png')}}"></a></li>
                                                <li class="facebook"><a href="https://www.facebook.com/Campo-Competitivo-AgrOMG-214899215376460/?ref=hl" target="_blank"><img width="25" height="25" src="{{url('img/3.png')}}"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Top Navigation -->
            <!-- Page Background used for background images -->
            <div id="page-bg"></div>
         <div class="header_wrapper header_1 no-transparent  "  >
                <header id="header" class="sticky_header "  >
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span12">
                                <!-- Logo -->
                                <div id="logo" class="">
                                    <a href="{{url('/')}}" ><img src='{{url('img/logo.png')}}' class="logo imagenBase s5_logo" width="130" alt='' /></a>
                                </div>
                                <!-- #logo END -->
                                <div class="after_logo">
                                    <!-- Search -->
                                    @if($menu!="contacto")
                                    <div class="header_search">
                                        <div class="right_search">
                                            <i class="moon-search-2"></i>
                                        </div>
                                         
                                        <div class="right_search_container">
                                            <form action="{{url('Buscar')}}" id="search-form" method="get">
                                                <div class="input-append">
                                                    <input type="text" size="16" placeholder="Buscar&hellip;" name="q" id="s">
                                                    <button type="submit" class="more">Search</button>
                                                    <a href="#" class="close_"><i class="moon-close"></i></a>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                    @endif
                                    <!-- End Search-->
                                </div>
                                <!-- Show for all header expect header 4 -->
                                <div id="navigation" class="nav_top pull-right ">
                                    <nav>
                                        <ul id="menu-menu-1" class="menu themeple_megemenu" >
                                            @if($menu=="inicio")
                                             <li class="menu-item  current-menu-ancestor" ><a href="{{url('/')}}"><font size="3" color="#0053B8"><b>Inicio</b></font></a>

                                            </li>
                                            @else
                                            <li class="menu-item "><a href="{{url('/')}}"><font size="3" color="#0053B8">Inicio</font></a>

                                            </li>
                                            @endif

                                            @if($menu=="marcas")
                                            <li class="menu-item  current-menu-ancestor"><a href="{{url('Marcas')}}"><font size="3" color="#0053B8">Marcas</font></a>

                                            </li>
                                            @else
                                            <li class="menu-item"><a href="{{url('Marcas')}}"><font size="3" color="#0053B8">Marcas</font></a>

                                            </li>
                                            @endif

                                            @if($menu=="productos")
                                            <li class="menu-item  current-menu-ancestor"><a href="{{url('Productos')}}"><font size="3" color="#0053B8">Productos</font></a>

                                            </li>
                                            @else
                                            <li class="menu-item"><a href="{{url('Productos')}}"><font size="3" color="#0053B8">Productos</font></a>

                                            </li>
                                            @endif
                                            
                                            @if($menu=="areanegocios")
                                            <li class="  menu-item  current-menu-ancestor"><a href="{{url('areaNegocios')}}"><font size="3" color="#0053B8">Soluciones por industria</font></a>

                                            </li>
                                            @else
                                            <li class="  menu-item"><a href="{{url('areaNegocios')}}"><font size="3" color="#0053B8">Soluciones por industria</font></a>

                                            </li>
                                            @endif

                                            @if($menu=="servicios")
                                            <li class="menu-item    current-menu-ancestor"><a href="{{url('Servicios')}}"><font size="3"  color="#0053B8">Servicios</font></a>

                                            </li>
                                            @else
                                            <li class="menu-item  "><a href="{{url('Servicios')}}"><font size="3"  color="#0053B8">Servicios</font></a>

                                            </li>
                                            @endif
                                           
                                          
                                            @if($menu=="videos")
                                            <li class="menu-item   current-menu-ancestor"><a href="{{url('Videos')}}"><font size="3" color="#0053B8">Videos</font></a>

                                            </li>
                                            @else
                                             <li class="menu-item "><a href="{{url('Videos')}}"><font size="3" color="#0053B8" >Videos</font></a>

                                            </li>
                                            @endif
                                            
                                            @if($menu=="contacto")
                                             <li class="  menu-item  current-menu-ancestor"><a href="{{url('Contacto')}}"><font size="3" color="#0053B8">Contacto</font></a>
                                            </li>
                                            @else
                                            <li class="  menu-item"><a href="{{url('Contacto')}}"><font size="3"  color="#0053B8">Contacto</font></a>
                                            </li>
                                            @endif
                                            

                                            
                                            
                                            
                                           

                                            
                                        </ul>
                                    </nav>
                                </div>
                                <!-- #navigation -->
                                <!-- End custom menu here -->
                                <a href="#" class="mobile_small_menu open"></a>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Responsive Menu -->
                <div class="menu-small">
                    <ul class="menu">
                        <li class="menu-small menu-item-has-children"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="menu-small menu-item-has-children"><a href="{{url('Marcas')}}">Marcas</a></li>
                        <li class="menu-small menu-item-has-children"><a href="{{url('Productos')}}">Productos</a></li>
                        <li class="menu-small menu-item-has-children"><a href="{{url('Servicios')}}">Servicios</a></li>
                        <li class="menu-small menu-item-has-children"><a href="{{url('areaNegocios')}}">Soluciones por industria</a></li>
                        <li class="menu-small menu-item-has-children"><a href="{{url('Videos')}}">Videos</a></li>
                        <li class="menu-small menu-item-has-children"><a href="{{url('Contacto')}}">Contacto</a></li>
                    </ul>
                </div>
                <!-- End Responsive Menu -->
            </div>
            <?php
        }
            ?>