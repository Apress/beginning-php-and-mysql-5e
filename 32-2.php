<?php

    // Include the HTML_Table package
    require_once "HTML/Table.php";

    // Connect to the MySQL database
    $mysqli = new mysqli("localhost", "websiteuser", "secret", "corporate");

    // Create an array of table attributes
    $attributes = array('border' => '1');

    // Create the table object
    $table = new HTML_Table($attributes);

    // Set the headers

    $table->setHeaderContents(0, 0, "Order ID");
    $table->setHeaderContents(0, 1, "Client ID");
    $table->setHeaderContents(0, 2, "Order Time");
    $table->setHeaderContents(0, 3, "Sub Total");
    $table->setHeaderContents(0, 4, "Shipping Cost");
    $table->setHeaderContents(0, 5, "Total Cost");

    // Cycle through the array to produce the table data

    // Create and execute the query
    $query = "SELECT id AS `Order ID`, client_id AS `Client ID`,
                     order_time AS `Order Time`,
                     CONCAT('$', sub_total) AS `Sub Total`,
                     CONCAT('$', shipping_cost) AS `Shipping Cost`,
                     CONCAT('$', total_cost) AS `Total Cost`
                     FROM sales ORDER BY id";

    $stmt = $mysqli->prepare($query);

    $stmt->execute();

    $stmt->bind_result($orderID, $clientID, $time, $subtotal, $shipping, $total);

    // Begin at row 1 so don't overwrite the header
    $rownum = 1;

    // Format each row

    while ($stmt->fetch()) {

        $table->setCellContents($rownum, 0, $orderID);
        $table->setCellContents($rownum, 1, $clientID);
        $table->setCellContents($rownum, 2, $time);
        $table->setCellContents($rownum, 3, $subtotal);
        $table->setCellContents($rownum, 4, $shipping);
        $table->setCellContents($rownum, 5, $total);

        $rownum++;

    }

    // Output the data
    echo $table->toHTML();

    // Close the MySQL connection
    $mysqli->close();

?>
