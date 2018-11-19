<?php
    // Connect to the MySQL server and select the corporate database
    $mysqli = new mysqli("localhost","someuser","secret","corporate");

    // Open and parse the sales.csv file
    $fh = fopen("sales.csv", "r");

    while ($fields = fgetcsv($fh, 1000, ","))
    {
        $id = $ fields[0];
        $client_id = $fields[1];
        $order_time = $fields[2];
        $sub_total = $fields[3];
        $shipping_cost = $fields[4];
        $total_cost = $fields[5];

        // Insert the data into the sales table
        $query = "INSERT INTO sales SET id='$id',
            client_id='$client_id', order_time='$order_time',
            sub_total='$sub_total', shipping_cost='$shipping_cost',
            total_cost='$total_cost'";

        $result = $mysqli->query($query);
    }

    fclose($fh);
    $mysqli->close();
?>
