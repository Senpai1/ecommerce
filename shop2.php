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
    $result_array = $query_result->fetchAll(PDO::FETCH_ASSOC);
    ?>
  </div>
</div>

<!-- above is html -->

<?php include 'footer.php'; ?>
