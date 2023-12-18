<?php
include_once '../includes/header.php';
include_once '../includes/db.php';

// Fetch product and supplier data from the database
$productsQuery = "SELECT id, category FROM products";
$suppliersQuery = "SELECT supplier_id, supplier_name FROM suppliers";

$productsResult = $conn->query($productsQuery);
$suppliersResult = $conn->query($suppliersQuery);

// Check if the queries were successful
if (!$productsResult || !$suppliersResult) {
    echo "Error: " . $conn->error;
    exit;
}

$products = $productsResult->fetch_all(MYSQLI_ASSOC);
$suppliers = $suppliersResult->fetch_all(MYSQLI_ASSOC);

// Free result sets
$productsResult->free_result();
$suppliersResult->free_result();

?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Issue Item</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Enter Issue Details</h3>
                    </div>
                    <div class="card-body">
                        <form action="process_issue_item.php" method="post">
                            <div class="form-group">
                                <label for="product_id">Select Product:</label>
                                <select name="product_id" id="product_id" class="form-control" required>
                                    <?php foreach ($products as $product) : ?>
                                        <option value="<?= $product['id'] ?>"><?= $product['category'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="supplier_id">Select Supplier:</label>
                                <select name="supplier_id" id="supplier_id" class="form-control" required>
                                    <?php foreach ($suppliers as $supplier) : ?>
                                        <option value="<?= $supplier['supplier_id'] ?>"><?= $supplier['supplier_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="issue_date">Date of Issue:</label>
                                <input type="date" name="issue_date" id="issue_date" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="requested_by">Requested By:</label>
                                <input type="text" name="requested_by" id="requested_by" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="station">Station of Request:</label>
                                <input type="text" name="station" id="station" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Issue Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include_once '../includes/footer.php'; ?>
