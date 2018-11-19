<?php

    // Include the HTML_Table package
    require_once "HTML/Table.php";

    // Assemble the data in an array

    $salesreport = array(
    '0' => ["12309","45633","2010-12-19 01:13:42","$22.04","$5.67","$27.71"],
    '1' => ["12310","942","2010-12-19 01:15:12","$11.50","$3.40","$14.90"],
    '2' => ["12311","7879","2010-12-19 01:15:22","$95.99","$15.00","$110.99"],
    '3' => ["12312","55521","2010-12-19 01:30:45","$10.75","$3.00","$13.75"]
    );

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

    for($rownum = 0; $rownum < count($salesreport); $rownum++) {
        for($colnum = 0; $colnum < 6; $colnum++) {
            $table->setCellContents($rownum+1, $colnum,
                                     $salesreport[$rownum][$colnum]);
        }
    }

    // Output the data

    echo $table->toHTML();

?>
