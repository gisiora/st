<?php
include_once '../includes/header.php';
include_once '../includes/db.php';

// Check if the database connection is established
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch item data from the database
$itemQuery = "SELECT item_id, item_name FROM items";
$itemResult = $conn->query($itemQuery);

// Fetch supplier data from the database
$supplierQuery = "SELECT supplier_id, supplier_name FROM suppliers";
$supplierResult = $conn->query($supplierQuery);

// Check if the queries were successful
if (!$itemResult || !$supplierResult) {
    die("Error fetching data: " . $conn->error);
}

// Fetch associative arrays
$items = $itemResult->fetch_all(MYSQLI_ASSOC);
$suppliers = $supplierResult->fetch_all(MYSQLI_ASSOC);

// Free result sets
$itemResult->free_result();
$supplierResult->free_result();
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
                                <label for="item_id">Item Name:</label>
                                <!-- Populate the dropdown with item data from the database -->
                                <select name="item_id" id="item_id" class="form-control" required>
                                    <?php
                                    foreach ($items as $item) {
                                        echo "<option value=\"{$item['item_id']}\">{$item['item_name']}</option>";
                                    }
                                    ?>
                                </select>
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
                                <label for="unit">Unit:</label>
                                <input type="text" name="unit" id="unit" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="quantity_received">Quantity Received:</label>
                                <input type="number" name="quantity_received" id="quantity_received" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="delivery_date">Date of Delivery:</label>
                                <input type="date" name="delivery_date" id="delivery_date" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="received_by">Received by:</label>
                                <input type="text" name="received_by" id="received_by" class="form-control" required>
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
