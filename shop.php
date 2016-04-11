<?php include 'header.php'; ?>
<?php include 'database.php'; ?>

<!-- Below is html -->

<div class="container">
  <div class="row">

    <?php

    $query = "SELECT * FROM cart_producten";
    // Try to execute the SQL query
    $query_result = $conn->query( $query );
    // Return the result of the query
    $results_array = $query_result->fetchAll(PDO::FETCH_ASSOC);

    if ( $database_config['debug'] ) {
      echo "<pre>";
      print_r ( $results_array );
      echo "</pre>";
    }

    foreach ( $results_array as $product ) {
      ?>

      <div class="col-md-4 col-xs-12 productlisting">
        <h2><?php echo $product['name']; ?></h2>
        <p>€ <?php echo $product['price']; ?></p>
        <a href="./cart.php?pid=<?php echo $product['id']; ?>">Add to cart</a>
      </div>

      <?php

    }

    ?>

  </div>
</div>
<!-- Above is html -->

<?php include 'footer.php'; ?>
