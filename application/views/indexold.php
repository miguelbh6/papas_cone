<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url();?>assets/resources/imgs/favicon.png">
    <title><?php echo 'Papas Cone - Batata frita e muuuuito molho'?></title>
    
    <!-- Library jQuery -->
    <script src="<?php echo base_url();?>assets/jquery/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/jquery/jquery-validation-1.17.0/dist/jquery.validate.js"></script>
    <script src="<?php echo base_url();?>assets/jquery/jquery.mask.min.js"></script>

    <!-- Library CSS -->
    <link href="<?php echo base_url();?>assets/css/lecker_library.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/fonts/themify-icons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/fonts/selima/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/lecker_style.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Lato" rel="stylesheet">

    <script type="text/javascript">
        setTimeout(function() {
            $('#divmessage').css('visibility','hidden')
        }, 10000);
    </script>
    <style type="text/css">
    .alterarFonte{
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        font-size: 20px;
    }
</style>
</head>
<body class="lec_france" data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-inverse navbar-fixed-top alterarFonte">
      <div class="container">
        <div class="col-md-2"></div>
        <div class="navbar-header col-md-1">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="#top"><img src="<?php echo base_url();?>assets/images/logo.png" width="40px" /></a>
      </div>
      <div>
          <div class="collapse navbar-collapse col-md-8" id="myNavbar">
            <ul class="nav navbar-nav">
              <li><a href="#quem-somos">Quem Somos</a></li>
              <li><a href="#cones">Produtos</a></li>
              <li><a href="#lojas">Lojas</a></li>
              <li><a href="#franquias">Franquias</a></li>
              <li><a href="#contato">Contato</a></li>
          </ul>
      </div>
  </div>
</div>
</nav>

<!-- Page -->
<div class="lec_page lec_page_red" id="lec_page">

    <!-- To Top -->
    <a href="#lec_page" class="lec_top lec_go"><b class="ti ti-angle-up"></b></a>

    <!-- Header -->
    <header>

    </header>
    <!-- Header End -->

    <!-- Slider -->
    <div class="lec_slider lec_image_bck lec_fixed lec_wht_txt" data-stellar-background-ratio="0.3" data-image="<?php echo base_url();?>assets/images/header-bg.jpg">
        <!-- Over -->
        <div class="lec_over" data-color="#7e9b3e" data-opacity="0.1"></div>
        <div class="container"></div>
        <!-- container end -->
        <!-- Slide Down -->
        <a class="lec_scroll_down lec_go" href="#quem-somos">
            <b></b>
            <i class="ti ti-angle-double-down"></i>
        </a>
    </div>
    <!-- Slider End -->

    <!-- Content -->
    <section id="quem-somos" class="lec_content container-fluid">
        <!-- section -->
        <section class="lec_section lec_section_no_overlay">
            <!-- Over 
            <div class="lec_over" data-color="#333" data-opacity="0.05"></div>-->
            <div class="container text-center">
                <?php require_once('site/quemsomos.php');                            ?>
            </div>
            <!-- container end -->
        </section>
        <!-- section end -->

        <!-- section -->
        <section class="lec_section container-fluid" id="cones">
            <div class="container text-center">
                <?php require_once('site/produtos.php');
                ?>
                <!-- boxes end -->
            </div>
            <!-- container end -->
        </section>
        <!-- section end -->

        <!-- section -->
        <section class="lec_section lec_section_no_overlay container-fluid" id="lojas">
            <!-- Over -->
            <div class="lec_over" data-color="#333" data-opacity="0"></div>
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-9 lec_animation_block lec_map_hidden_top" data-bottom-top="transform:translate3d(0px, 40px, 0px)" data-top-bottom="transform:translate3d(0px, -40px, 0px)">
                        <div class="lec_map_container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15004.573795894823!2d-43.9423!3d-19.918359!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xeefc9cc7cc707662!2sPapas+Cone!5e0!3m2!1spt-BR!2sbr!4v1520998594763" height="680" scrolling="no"></iframe>
                        </div>
                    </div>
                    <div class="col-md-5 lec_animation_block lec_animation_abs_block lec_posr lec_image_bck" data-bottom-top="transform:translate3d(0px, 0px, 0px)" data-top-bottom="transform:translate3d(0px, 40px, 0px)">
                        <!-- Over -->
                        <div class="lec_over" data-color="#000" data-opacity="0.05"></div>
                        <div class="lec_parallax_menu lec_image_bck lec_fixed">
                            <?php require_once('site/lojas.php');
                            ?>
                            <a href="#franquias" class="btn">Seja um franqueado <i class="ti ti-email"></i></a>
                        </div>
                    </div>
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
        </section>
        <!-- section end -->

        <!-- section -->
        <section class="lec_section lec_section_no_overlay" id="franquias">
            <!-- Over 
            <div class="lec_over" data-color="#333" data-opacity="0.05"></div>-->
            <div class="container text-center">
                <div class="row">
                    <?php require_once('site/franquias.php'); ?>
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
        </section>
        <!-- section end -->

        <!-- section -->
        <section class="lec_section lec_section_no_overlay" id="contato">
            <!-- Over 
            <div class="lec_over" data-color="#fff" data-opacity="0.9"></div>-->
            <div class="container text-center">
                <h2 class="lec_gold lec_title_counter">Entre em contato</h2>
                <h3 class="lec_gold_subtitle">Para informações sobre nossos produtos, modelo de negócios e franquias</h3>
                <?php require_once('site/contato.php'); ?>
                <!-- row end -->
            </div>
            <!-- container end -->
        </section>
        <!-- section end -->
    </section>
    <!-- Content End -->

    <!-- Footer -->
    <footer class="lec_image_bck text-center lec_image_bck lec_fixed lec_wht_txt" data-stellar-background-ratio="0.3" data-image="<?php echo base_url();?>assets/images/bg-footer.jpg">
        <div class="lec_over" data-color="#000" data-opacity="0.8"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><img src="<?php echo base_url();?>assets/images/organic_logo.png" alt="" height="150"></p>
                    <p>(31) 3275-1772 - Av. Paraná, 292 - Centro, Belo Horizonte - MG, 30120-020</p>
                    <div class="lec_footer_social">
                        <div data-animation="animation_blocks" data-bottom="@class:noactive" data--100-bottom="@class:active">
                            <a href="https://www.facebook.com/papascone/"><i class="ti ti-facebook lec_icon_box"></i></a>
                            <a href="https://www.instagram.com/papascone/"><i class="ti ti-instagram lec_icon_box"></i></a>
                        </div>
                    </div>
                    <p>© Papas Cone 2018</p>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="<?php echo base_url();?>assets/jquery/lecker_library.js"></script>
<script src="<?php echo base_url();?>assets/jquery/lecker_script.js"></script>
</body>
</html>
