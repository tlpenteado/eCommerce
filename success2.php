<?php


  if(session_id() == '' || !isset($_SESSION)){session_start();}
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sucesso!</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">GATE Sneakers</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>
      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">

          <li><a href="products.php">Produtos</a></li>
          <li><a href="cart.php">Carrinho</a></li>
          <li><a href="orders.php">Meus Pedidos</a></li>

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
      <div class="small-12">
        <p>Sucesso! Você acabou de realizar a compra do seu novo Tênis com a GATE Sneakers. Agradeçemos pela preferência.</p>
        <p>Para mais detalhes do seu pedido, verifique a página "Meus Pedidos".</p>
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