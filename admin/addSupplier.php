<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include_once '../includes/db.php'; // Make sure the file name is correct

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_supplier'])) {
    $supplierCode = $_POST['supplier_code'];
    $supplierName = $_POST['supplier_name'];
    $supplierAddress = $_POST['supplier_address'];

    // Validation (you can add more validation as needed)

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO suppliers (supplier_code, supplier_name, supplier_address, creation_date) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $supplierCode, $supplierName, $supplierAddress);

        if ($stmt->execute()) {
            // Redirect to a success page
            header("Location: success.php");
            exit();
        } else {
            // Log the error or print it for debugging
            error_log("Error: " . $sql . "\n" . $stmt->error);
            echo "Error adding supplier to the database. Please check the logs for more information.<br>";
        }

        $stmt->close();
    } else {
        // Log the error or print it for debugging
        error_log("Error preparing statement: " . $conn->error);
        echo "Error preparing statement. Please check the logs for more information.<br>";
    }
} else {
    echo "Invalid request method or data.";
}

// Include footer
include_once '../includes/footer.php';
?>
