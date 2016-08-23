  <div class="footer_social_bar">
                <div class="container">
                <div class="row-fluid">
                <div class="span12">
                <div class="top_footer">
                <div class="container">
                <div class="title"><i class="moon-newspaper"></i><span>Notiexpress</span></div>
                <div class="triangle"></div>
                <div class="caroufredsel_wrapper" style="display: block; text-align: start; float: left; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 644px; height: 40px; margin: 13px 0px; overflow: hidden;">
                    <ul class="tweet_list" id="tweet_footer" style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 4508px; height: 20px;">
                        <?php
                                            $notitas=Noticia::all();
                                            ?>
                                            @for($c=0;$c<3;$c++)
                                            <li class="tweet"> <h5>{{$notitas[$c]->titulo}}... <a href="http://t.co/502gW1SS6P" class="twitter-link">Ver más</a> </h5></li>
                                            @endfor
                 </ul>
                            </div>
                                <div class="pagination pull-right"><a href="#" class="back" style="display: block;"><i class="moon-arrow-left"></i></a><a href="#" class="next" style="display: block;"><i class="moon-arrow-right-2"></i></a></div><span class="shadow_top_footer"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

