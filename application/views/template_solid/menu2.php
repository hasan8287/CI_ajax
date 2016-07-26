    <nav class="navbar navbar-default navbar-intimate role="
        data-offset-top="50" data-spy="affix">
            <div class="container">
                <div class="navbar-header">
                    <!-- Start Toggle Nav For Mobile -->
                     <button class="navbar-toggle" data-target="#navigation"
                    data-toggle="collapse" type="button"><span class=
                    "sr-only">Toggle navigation</span> <span class=
                    "icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                    <div class="logo"><br>
                        <a class="navbar-brand" href="index.html">
                         <img src="<?php echo base_url() ?>asset/img/logo.png">
                        </a>
                    </div>
                </div><!-- Stat Search -->
                <div class="side">
                    <a class="show-search"><i class="ico-search"></i></a>
                </div><!-- Form for navbar search area -->
                <form class="full-search">
                    <div class="container">
                        <div class="row">
                            <input class="form-control" placeholder="Search"
                            type="text"> <a class="close-search"><span class=
                            "ico-times"></span></a>
                        </div>
                    </div>
                </form><!-- Search form ends -->
                <!-- Navigation Start -->
                <div class="navbar-collapse collapse" id="navigation">
                    <ul class="nav navbar-nav navbar-right">
                         <li>
                            <a href="<?php echo base_url() ?>solid">HOME</a>
                        </li>
                        <li>
                            <a  href="<?php echo base_url() ?>solid/product"> Portfolio</a>
                            
                        </li>

                        <li>
                            <a  href="<?php echo base_url() ?>solid/admin"><b style="color: red;">Login Admin Ndes</b></a>
                            
                        </li>

                        <!--
                        <li class="dropdown dropdown-toggle">
                            <a data-toggle="dropdown" href="#">Blog</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="blog.html">Blog View</a>
                                </li>
                                <li>
                                    <a href="single.html">Single Post</a>
                                </li>
                            </ul>
                        </li>
                        -->
                    </ul>
                </div><!-- Navigation End -->
            </div>
        </nav><!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
            <li class="active">
                <a href="#">Home</a>
                <ul>
                    <li>
                        <a href="fullscreen-slider.html">Home - Fullscreen
                        Slider</a>
                    </li>
                    <li>
                        <a href="carousel-slider.html">Home - Post Carousel</a>
                    </li>
                    <li class="active">
                        <a href="index.html">Home - Default</a>
                    </li>
                </ul>
            </li>
            <li>
                 <a  href="<?php echo base_url() ?>"solid/product> Portfolio</a>
                            
           </li>
            <li>
                <a href="#">Blog</a>
                <ul>
                    <li>
                        <a href="blog.html">Blog View</a>
                    </li>
                    <li>
                        <a href="single.html">Single Post</a>
                    </li>
                </ul>   
            </li>
            <li>
                <a href="contact.html">Contact</a>
            </li>
            <li>
                <a href="#">Download</a>
            </li>
        </ul><!-- Mobile Menu End -->