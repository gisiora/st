<?php
include_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $item_id = intval($_POST['item_id']);
    $supplier_id = intval($_POST['supplier_id']);
    $unit = htmlspecialchars($_POST['unit']);
    $quantity_received = intval($_POST['quantity_received']);
    $delivery_date = htmlspecialchars($_POST['delivery_date']);
    $received_by = htmlspecialchars($_POST['received_by']);

    // Use prepared statement to prevent SQL injection
    $insertSql = "INSERT INTO received_items (item_id, supplier_id, unit, quantity_received, delivery_date, received_by) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertSql);

    if ($stmt) {
        $stmt->bind_param("iisiss", $item_id, $supplier_id, $unit, $quantity_received, $delivery_date, $received_by);

        if ($stmt->execute()) {
            // Item received successfully, redirect to a success page or the same form
            header("Location: receive_item_form.php?success=1");
            exit();
        } else {
            // Log the error
            error_log("Error inserting received item: " . $stmt->error);
            echo "Error receiving item. Please try again later.<br>";
        }

        $stmt->close();
    } else {
        // Log the error
        error_log("Error preparing statement: " . $conn->error);
        echo "Error preparing statement. Please try again later.<br>";
    }

} else {
    echo "Invalid request method.";
}
?>
