<?php include_once '../includes/header.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Supplier Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Supplier Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Add Supplier</h3>
                                                </div>
                                                <form action="addSupplier.php" method="POST">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="supplier_code">Supplier Code:</label>
                                                            <input type="text" name="supplier_code" class="form-control" placeholder="Enter supplier code" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="supplier_name">Supplier Name:</label>
                                                            <input type="text" name="supplier_name" class="form-control" placeholder="Enter supplier name" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="supplier_address">Supplier Address:</label>
                                                            <textarea name="supplier_address" class="form-control" placeholder="Enter supplier address" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" name="add_supplier" class="btn btn-primary">Add Supplier</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once '../includes/footer.php'; ?>
