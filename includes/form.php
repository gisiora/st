<?php
include_once '../includes/header.php';
include_once '../includes/db.php';

// Fetch supplier data from the database
$query = "SELECT supplier_id, supplier_name FROM suppliers";
$result = $conn->query($query);

// Fetch product data from the database
$productQuery = "SELECT product_id, product_name FROM products";
$productResult = $conn->query($productQuery);

// Check if the queries were successful
if ($result && $productResult) {
    // Fetch associative arrays
    $suppliers = $result->fetch_all(MYSQLI_ASSOC);
    $products = $productResult->fetch_all(MYSQLI_ASSOC);

    // Free result sets
    $result->free_result();
    $productResult->free_result();
} else {
    // Handle the error
    echo "Error: " . $conn->error;
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Receive Item</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Enter Item Details</h3>
                    </div>
                    <div class="card-body">
                        <form action="process_receive_item.php" method="post">
                            <div class="form-group">
                                <label for="product_id">Product Name:</label>
                                <!-- Populate the dropdown with product data from the database -->
                                <select name="product_id" id="product_id" class="form-control" required>
                                    <?php
                                    foreach ($products as $product) {
                                        echo "<option value=\"{$product['product_id']}\">{$product['product_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity_received">Quantity Received:</label>
                                <input type="number" name="quantity_received" id="quantity_received" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="supplier_id">Supplier:</label>
                                <!-- Populate the dropdown with supplier data from the database -->
                                <select name="supplier_id" id="supplier_id" class="form-control" required>
                                    <?php
                                    foreach ($suppliers as $supplier) {
                                        echo "<option value=\"{$supplier['supplier_id']}\">{$supplier['supplier_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="delivery_date">Date of Delivery:</label>
                                <input type="date" name="delivery_date" id="delivery_date" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Receive Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php include_once '../includes/footer.php'; ?>
