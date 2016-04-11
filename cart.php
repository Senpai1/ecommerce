<?php include 'header.php'; ?>
<?php include 'database.php'; ?>

<?php

session_start();

if ( isset ( $_GET['remove'] )  ) {
  echo 'Triggered';
  $_SESSION['cart_content'] = preg_replace('/'.$_GET['pid'].'/', '', $_SESSION['cart_content'], 1);
  $_SESSION['cart_content'] = preg_replace('/,,/', ',', $_SESSION['cart_content'], 1);
  $_SESSION['cart_content'] = trim ( $_SESSION['cart_content'], "," );
  header('location: cart.php');
}

if ( isset ( $_GET['pid'] ) && !isset ( $_GET['remove'] ) ) {
  if  ( !isset( $_SESSION['cart_content'] ) ) {
    $_SESSION['cart_content'] = $_GET['pid'];
  } else {
    $_SESSION['cart_content'] .= ',';
    $_SESSION['cart_content'] .= $_GET['pid'];
  }

}

if  ( isset ($_GET['empty'] )  ) {
  session_destroy();
  header('location: cart.php');
}

if ( $database_config['debug'] ) {
  echo "<pre>";
  print_r ( $_SESSION );
  echo "</pre>";
}

if  ( isset ( $_SESSION['cart_content'] )  ){
    if   ( strlen ( $_SESSION['cart_content'] ) < 1  ) {
      unset  ( $_SESSION['cart_content'] );
    }
}
 ?>

 <!-- Below is html -->

 <div class="container">
   <div class="row">

     <h2>Producten in winkelwagen</h2>

     <?php

     if ( isset( $_SESSION['cart_content'] ) ) {
       $cart_array = explode( ',', $_SESSION['cart_content'] );

       if  ( $database_config['debug'] ) {
         echo "<pre>";
         print_r ( $cart_array );
         echo "</pre>";
       }
       foreach  ( $cart_array as $item ) {
         $query = "SELECT * FROM cart_producten WHERE id='" . $item . "' ";
         // Try to execute the SQL query
         $query_result = $conn->query( $query );
         // Return the result of the query
         $product = $query_result->fetch(PDO::FETCH_ASSOC);
         ?>

         <div class="col-md-12 col-xs-12 productlisting">
           <p class="col-md-4"><?php echo $product['name']; ?></p>
           <p class="col-md-4">€ <?php echo $product['price']; ?></p>
           <a class="col-md-4" href="./cart.php?remove=true&pid=<?php echo $product['id']; ?>">Remove</a>
         </div>

         <?php
       }
     }


    ?>

  </div>

  <div class="row">
    <form action="bestelling.php" method="POST">
      <div class="form-group">
        <input placeholder="name" type="name" name="name">
        <input placeholder="email" type="email" name="email">
        <input class="btn btn-default" type="submit" value="Order">
      </div>
    </form>
  </div>

</div>

<!-- Above is html -->



<?php include 'footer.php' ?>
