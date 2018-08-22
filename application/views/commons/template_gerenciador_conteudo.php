<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <?php require 'head.php';?>
 <style type="text/css">

 .dropdown-submenu{
  position: relative;
}
.dropdown-submenu a::after{
  transform: rotate(-90deg);
  position: absolute;
  right: 3px;
  top: 40%;
}
.dropdown-submenu:hover .dropdown-menu, .dropdown-submenu:focus .dropdown-menu{
  display: flex;
  flex-direction: column;
  position: absolute !important;
  margin-top: -30px;
  left: 100%;
}
@media (max-width: 992px) {
  .dropdown-menu{
    width: 50%;
  }
  .dropdown-menu .dropdown-submenu{
    width: auto;
  }
}
</style>
</head>
<body>
  <?php $user_logado = $this->session->userdata("username");
  if (!empty($user_logado)):
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="<?php echo base_url('franqueado/limpar'); ?>"><img src="<?php echo base_url();?>assets/images/logo.png" width="40px" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php     if ($this->session->userdata("username") == 'admin'): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('franqueado/search');?>">Candidatos</a>
            </li>
          <?php    endif;      ?>
           <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('entrevista/listarAgendadas');?>">Entrevistas</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('parametro');?>">Parâmetros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('lojapromocao');?>">Lojas com Promoções</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('promocao');?>">Promoções</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('introducao');?>">Introdução</a>
            </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Site
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php    echo base_url('faq');?>">Faq</a>
              <a class="dropdown-item" href="<?php    echo base_url('franquias');?>">Franquias</a>
              <a class="dropdown-item" href="<?php    echo base_url('quemsomos');?>">Quem Somos</a>
              <a class="dropdown-item" href="<?php    echo base_url('lojas');?>">Lojas</a>
              <a class="dropdown-item" href="<?php    echo base_url('produtos');?>">Produtos</a>
              <a class="dropdown-item" href="<?php    echo base_url('produtoscategoria');?>">Categoria de produtos</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link disabled" href="#">
              <i class="fas fa-user"></i> <?php    echo 'Usúario: ' . $this->session->userdata("username");?>
            </a>
          </li>
          <li class="nav-item">
            <a class="btn navbar-btn btn-light" href="<?php    echo base_url('usuario/logout');?>"><i class="fas fa-sign-out-alt"></i> Sair</a>
          </li>
        </ul>
      </div>
    </nav>
  <?php endif;?>
  <br>
  <div>
    <?php echo $contents; ?>
  </div>
  <?php require 'footer.php'; ?>
</body>
</html>