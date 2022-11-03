<?php


  if(session_id() == '' || !isset($_SESSION)){session_start();}
  include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produtos</title>
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

          <li class='active'><a href="products.php">Products</a></li>
          <li><a href="cart.php">Carrinho</a></li>
          <li><a href="orders.php">Meus Pedidos</a></li>

          <?php
            if(isset($_SESSION['username'])){
              echo '<li><a href="account.php">Minha Conta</a></li>';
              echo '<li><a href="logout.php">Sair</a></li>';
            } else {
              echo '<li><a href="login.php">Log In</a></li>';
              echo '<li><a href="register.php">Cadastrar</a></li>';
            }
          ?>
        </ul>
      </section>
    </nav>
    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();
          $result = $mysqli->query('SELECT * FROM products');
          if($result === FALSE){
            die(mysql_error());
          }
          if($result){
            while($obj = $result->fetch_object()) {
              echo '<div class="large-4 columns">';
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<p><strong>Código do Produto</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Descrição</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Unidades em Estoque</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Preço (por Unidade)</strong>: '.$currency.$obj->price.'</p>';
              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              } else {
                echo 'Fora de Estoque!';
              }
              echo '</div>';
              $i++;
            }
          }
          $_SESSION['product_id'] = $product_id;
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