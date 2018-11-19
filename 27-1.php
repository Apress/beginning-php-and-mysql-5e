<?php
    // Create a new server connection
    $mysqli = new mysqli('localhost', 'catalog_user', 'secret', 'corporate');

    // Create the query and corresponding placeholders
    $query = "INSERT INTO products SET sku=?, name=?, price=?";

    // Create a statement object
    $stmt = $mysqli->stmt_init();

    // Prepare the statement for execution
    $stmt->prepare($query);

    // Bind the parameters
    $stmt->bind_param('ssd', $sku, $name, $price);

    // Assign the posted sku array
    $skuarray = $_POST['sku'];

    // Assign the posted name array
    $namearray = $_POST['name'];

    // Assign the posted price array
    $pricearray = $_POST['price'];

    // Initialize the counter
    $x = 0;

    // Cycle through the array, and iteratively execute the query
    while ($x < sizeof($skuarray)) {
        $sku = $skuarray[$x];
        $name = $namearray[$x];
        $price = $pricearray[$x];
        $stmt->execute();
    }

    // Recuperate the statement resources
    $stmt->close();

    // Close the connection
    $mysqli->close();

?>
