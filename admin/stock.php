<?php
// Include the database connection script
include_once '../includes/db.php';

// Fetch data from the database
$query = "SELECT
            products.product_name AS item_name,
            stock.quantity AS unit_quantity,
            suppliers.supplier_name AS supplier,
            stock.transaction_date AS date_of_received,
            stock.quantity AS available_stock
          FROM stock
          INNER JOIN products ON stock.product_id = products.id
          INNER JOIN suppliers ON stock.supplier_id = suppliers.supplier_id";  // Use 'suppliers.supplier_id' if that's your primary key

// Perform the query
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Display the data in a table
        echo "<table border='1'>
                <tr>
                    <th>Item Name</th>
                    <th>Unit Quantity</th>
                    <th>Supplier</th>
                    <th>Date of Received</th>
                    <th>Available Stock</th>
                </tr>";

        // Loop through the rows and display data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['item_name']}</td>
                    <td>{$row['unit_quantity']}</td>
                    <td>{$row['supplier']}</td>
                    <td>{$row['date_of_received']}</td>
                    <td>{$row['available_stock']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No data available.";
    }

    // Free the result set
    $result->free_result();
} else {
    echo "Error executing the query: " . $conn->error; // Use $conn->error to get the MySQLi error
}

// Close the database connection
$conn->close();
?>
