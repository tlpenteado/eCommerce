<?php


  if(session_id() == '' || !isset($_SESSION)){session_start();}
  if(!isset($_SESSION["username"])) {
    header("location:index.php");
  }
  if($_SESSION["type"]!="admin") {
    header("location:index.php");
  }
  include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
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
          <li><a href="indexreg.php">Cadastrar Produtos</a></li>
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
      <div class="large-12">
        <h3>Olá Admin!</h3>
        <h4>Alterar a Quantidade em estoque de cada produto</h4>
        <?php
          $result = $mysqli->query("SELECT * from products order by id asc");
          if($result) {
            while($obj = $result->fetch_object()) {
              echo '<div class="large-4 columns">';
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';     
              echo '<p><strong>Código do Produto</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Descrição</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Unidades em Estoque</strong>: '.$obj->qty.'</p>';
              echo '<div class="large-6 columns" style="padding-left:0;">';
              echo '<form method="post" name="update-quantity" action="admin-update.php">';
              echo '<p><strong>Nova QTD</strong>:</p>';
              echo '</div>';
              echo '<div class="large-6 columns">';
              echo '<input type="number" name="quantity[]"/>';
              echo '</div>';
              echo '</div>';
            }
          }
        ?>
      </div>
    </div>
    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <center><p><input style="clear:both;" type="submit" class="button" value="Atualizar Quantidade"></p></center>
        </form>
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