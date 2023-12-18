<?php
include_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $product_code = htmlspecialchars($_POST['product_code']);
    $item_name = htmlspecialchars($_POST['item_name']);
    $category = htmlspecialchars($_POST['category']);

    // Use prepared statement to prevent SQL injection
    $insertSql = "INSERT INTO items (product_code, item_name, category) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertSql);

    if ($stmt) {
        $stmt->bind_param("sss", $product_code, $item_name, $category);

        if ($stmt->execute()) {
            // Item added successfully, redirect to a success page or the same form
            header("Location: addItemForm.php?success=1");
            exit();
        } else {
            // Log the error
            error_log("Error inserting item: " . $stmt->error);
            echo "Error adding item. Please try again later.<br>";
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
