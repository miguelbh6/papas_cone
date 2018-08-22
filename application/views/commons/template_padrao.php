<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="miguelbh6@gmail.com">
        <link rel="icon" href="<?php echo base_url();?>assets/resources/imgs/favicon.png">
        <title>Papas Cone</title>

        <!-- Bootstrap core CSS -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="<?php echo base_url();?>/bootstrap/css/bootstrap.min.css">
        <script src="<?php echo base_url();?>jquery/jquery-3.2.1.min.js"></script>
        <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>jquery/jquery-validation-1.17.0/dist/jquery.validate.js"></script>
        <script src="<?php echo base_url();?>jquery/jquery-priceformat-1.0.2/dist/jquery.priceformat.min.js"></script>
         <script src="<?php echo base_url();?>jquery/jquery.mask.min.js"></script>

        <style type="text/css">
            .margin-button15 { margin-bottom: 15px; }
            label.error {
                float: none;
                color: red;
                margin: 0 .5em 0 0;
                vertical-align: top;
                font-size: 10px
            }
            .profile-img
            {
                width: 50px;
                height: 40px;
                margin: 5px auto;
                display: block;
                border-radius: 50%;
                -webkit-mask-image: none;
            }

            .footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                /* Set the fixed height of the footer here */
                height: 3em;
                background-color: #222;
                text-align: center;
                padding-top: 1em;
                color: #fff;
            }
        </style>
    </head>
    <body>
        <?php
        $user_logado = $this->session->userdata("username");
        if (!empty($user_logado)):
            ?>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo base_url('franqueado'); ?>">Papas Cone</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <?php
                        if ($this->session->userdata("username") == 'admin'):
                            ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Candidatos
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('franqueado'); ?>">Listar</a></li>
                                    <li><a href="<?php echo base_url('franqueado/inserir'); ?>">Adicionar</a></li>
                                </ul>
                            </li>
                            <?php
                        endif;
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Faq
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('faq'); ?>">Listar</a></li>
                                <li><a href="<?php echo base_url('faq/inserir'); ?>">Adicionar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Franquias
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('franquias'); ?>">Listar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Lojas
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('lojas'); ?>">Listar</a></li>
                            </ul>
                        </li>
                        <!-- 
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cargo
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('cargo'); ?>">Listar</a></li>
                                <li><a href="<?php echo base_url('cargo/inserir'); ?>">Inserir</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Departamento
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('departamento'); ?>">Listar</a></li>
                                <li><a href="<?php echo base_url('departamento/inserir'); ?>">Inserir</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Funcionario
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('funcionario'); ?>">Listar</a></li>
                                <li><a href="<?php echo base_url('funcionario/inserir'); ?>">Inserir</a></li>
                            </ul>
                        </li>
                        -->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url('usuario/logout') ?>">LOGOUT</a></li>
                    </ul>
                    <?php
                    if ($this->session->userdata("username") == 'admin'):
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><img class="profile-img" src="/assets/resources/imgs/business_user.png" alt="" /></li>
                        </ul>
                        <?php
                    else:
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><img class="profile-img" src="/assets/resources/imgs/users.png" alt="" /></li>
                        </ul>
                    <?php
                    endif;
                    ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <?php echo 'Usúario: ' . $this->session->userdata("username") ?>
                            </a>
                        </li>
                    </ul>

                </div>

            </nav>
            <?php
        endif;
        ?>

        <div>
            <?php echo $contents; ?>
        </div>
    </body>
    <div class="footer">
        <div class="site-footer">
            <p>Desenvolvido por @miguelbh6  contato -> (31) 98888-0509</p>
        </div>
    </div>
</html>