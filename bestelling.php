<?php include 'header.php'; ?>
<?php include 'database.php'; ?>

<?php

////////////////
// Make a new customer
////////////////

try {

    $stmt = $conn->prepare("INSERT INTO cart_klanten (name, email) VALUES (?, ?)");
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $email);

// insert one row
    $name = $_POST['name'];
    $email = $_POST['email'];
    $stmt->execute();
    $lastId = $conn->lastInsertId();


} catch ( PDOException $ex ) {
    if  ( $database_config['debug'] ) {
        $error = $ex->getMessage();
        echo $error;
    }
}

/////////////////////
// Calculate total price
/////////////////////

session_start();
$total_order = 0;
if  ( isset( $_SESSION['cart_content'] ) ) {
    $cart_array = explode( ',', $_SESSION['cart_content'] );

    foreach  ( $cart_array as $item ) {
        $query = "SELECT * FROM cart_producten WHERE id='" . $item . "' ";
                //Try to execute the SQL query
        $query_result = $conn->query( $query );
                // Return the result of the query
        $product = $query_result->fetch(PDO::FETCH_ASSOC);
        $total_order += $product['price'];
    }
}

//////////////////////
// Make a new order
/////////////////////

try {

    $stmt = $conn->prepare("INSERT INTO cart_bestellingen (totaal_prijs, klant_id) VALUES (?, ?)");
    $stmt->bindParam(1, $totaal_prijs);
    $stmt->bindParam(2, $klant_id);

// insert one row
    $totaal_prijs = $total_order;
    $klant_id = $lastId;
    $stmt->execute();
    $lastOrderId = $conn->lastInsertId();

} catch ( PDOException $ex) {
    if  ( $database_config['debug'] ) {
      $error = $ex->getMessage();
      echo $error;
    }
}

/////////////////////
// Make a new order lines
////////////////////

if ( isset( $_SESSION['cart_content'] ) ) {
   $cart_array = explode( ',', $_SESSION['cart_content'] );

   foreach ($cart_array as $item) {
       $query = "SELECT * FROM cart_producten WHERE id='" . $item . "' ";
              // Try to execute the SQL query
       $query_result = $conn->query( $query );
              // Return the result of the query
       $product = $query_result->fetch(PDO::FETCH_ASSOC);

       try {

            $stmt = $conn->prepare("INSERT INTO cart_bestellingregels (product_id, bestelling_id, aantal) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $product_id);
            $stmt->bindParam(2, $bestelling_id);
            $stmt->bindParam(3, $aantal);

            $product_id = $item;
            $bestelling_id = $lastOrderId;
            $aantal = 1;

            $stmt->execute();

       } catch (PDOException $ex) {
            if ( $database_config['debug'] ){
              $error = $ex->getMessage();
              echo $error;
            }
       }

   }
}



 ?>

 <!-- Below is html -->

 <div class="container">
    <div class="row">
    <p>Order price: € <?php echo $total_order; ?>
    <p>Thank you for your order <?php echo $_POST['name']; ?>.</p>
    <p>Your order has been recorded as order number <?php echo $lastOrderId; ?>.</p>
  </div>
</div>

<!-- Above is html -->

<?php include 'footer.php'; ?>
