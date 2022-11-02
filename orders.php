<?php
//////////////////////////////////////////////////////////////////////////
// Criacao...........: 07/2009
// Sistema...........: Loja Virtual
// Analistas.........: Marilene Esquiavoni & Denny Paulista Azevedo Filho
// Desenvolvedores...: Marilene Esquiavoni & Denny Paulista Azevedo Filho
// Copyright.........: Marilene Esquiavoni & Denny Paulista Azevedo Filho
//////////////////////////////////////////////////////////////////////////

  if(session_id() == '' || !isset($_SESSION)){session_start();}
  if(!isset($_SESSION["username"])){
    header("location:index.php");
  }
  include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Orders || GATE Sneakers</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">GATE Sneakers</a></h1>
        </li>
        <li class="toggle-topbar menu-icon">
          <a href="#"><span></span></a>
        </li>
      </ul>
      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">

          <li><a href="products.php">Produtos</a></li>
          <li><a href="cart.php">Carrinho</a></li>
          <li class="active"><a href="orders.php">Meus Pedidos</a></li>

          <?php
            if(isset($_SESSION['username'])){
              echo '<li><a href="account.php">Minha Conta</a></li>';
              echo '<li><a href="logout.php">Sair</a></li>';
            } else {
              echo '<li><a href="login.php">Log In</a></li>';
              echo '<li><a href="register.php">Cadastrar-se</a></li>';
            }
          ?>
        </ul>
      </section>
    </nav>
    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>Meus Pedidos Concluídos</h3>
        <hr>
        <?php
          $user = $_SESSION["username"];
          $result = $mysqli->query("SELECT * from orders where email='".$user."'");
          if($result) {
            while($obj = $result->fetch_object()) {
              //echo '<div class="large-6">';
              echo '<p><h4>ID do Pedido: '.$obj->id.'</h4></p>';
              echo '<p><strong>Data da Compra</strong>: '.$obj->date.'</p>';
              echo '<p><strong>Código do Produto</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Nome do Produto</strong>: '.$obj->product_name.'</p>';
              echo '<p><strong>Preço por Unidade</strong>: '.$obj->price.'</p>';
              echo '<p><strong>Unidades Compradas</strong>: '.$obj->units.'</p>';
              echo '<p><strong>Custo Total</strong>: '.$currency.$obj->total.'</p>';
              //echo '</div>';
              //echo '<div class="large-6">';
              //echo '<img src="images/products/sports_band.jpg">';
              //echo '</div>';
              echo '<p><hr></p>';
            }
          }
        ?>
      </div>
    </div>
    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <footer>
          <p style="text-align:center; font-size:0.8em;">
            GATE Sneakers BR
          </p>
        </footer>
      </div>
    </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>