<?php
include_once '../includes/header.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Starter Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

          <div class="card card-primary card-outline">
            <div class="card-body">







              <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <!-- left column -->
                    <div class="col-md-9">
                      <!-- jquery validation -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Create Items</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="processaddItem.php" method="POST">
                          <div class="card-body">

                            <div class="form-group">
                              <label for="product_code">Product Code:</label>
                              <input type="text" name="product_code" class="form-control" placeholder="Enter product code" required>
                            </div>
                            <div class="form-group">
                              <label for="item_name">Item Name:</label>
                              <input type="text" name="item_name" class="form-control" placeholder="Enter product name">
                            </div>


                            <div class="form-group">
                              <label for="category">Category:</label>
                              <input type="text" name="category" class="form-control" placeholder="Category">
                            </div>


                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add Item</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                  </div>
                  <!-- /.row -->
                </div><!-- /.container-fluid -->
              </section>













            </div>
          </div><!-- /.card -->
        </div>
        <!-- /.col-md-6 -->

        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once '../includes/footer.php';


?>