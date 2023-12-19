<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('bootstrap-5.0.2-dist/css/bootstrap.min.css') ?>">
  <script src="<?= base_url('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <style>
    body {
      background-color: #f0f0f0;
      padding-top: 20px;
    }

    .dashboard-header {
      background-color: #007bff;
      color: white;
      padding: 20px;
      text-align: center;
      border-radius: 0 0 10px 10px;
    }

    .logout-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #dc3545;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      margin-right: 20px;
      float: right;
      margin-top: -40px;
    }

    .custom-hr {
      border: 2px solid #ccc;
      background-color: white;
      margin: 20px 0;
    }

    .bts {
      color: white;
    }

    .modal-content {
      background-color: #f0f0f0;
    }

    .form-label {
      color: #333;
    }

    .table-container {
      margin-top: 20px;
    }

    #ProductTB {
      background-color: white;
      color: #333;
    }

    #ProductTB th {
      background-color: #007bff;
      color: white;
    }

    .btn-add-product {
      background-color: #28a745;
      color: white;
    }

    .btn-update-product,
    .btn-delete-product {
      width: 80px;
      margin-right: 5px;
    }
  </style>
  <title>Dashboard</title>
</head>

<body>

  <div class="container-fluid">
    <div class="dashboard-header">
      <h1 class="bts">ADMIN DASHBOARD</h1>
      <a href="<?= site_url('main/logout') ?>" class="logout-button">Logout</a>
    </div>
    <hr class="custom-hr">
  </div>

  <div class="container-fluid">
    <div class="d-flex justify-content-start">
      <button type="button" class="btn btn-success btn-add-product" data-bs-toggle="modal" data-bs-target="#myProductModal">
        Add Product
      </button>
    </div>
    <div class="table-container">
      <table class="table table-bordered" id="ProductTB">
        <tr>
          <th class="text-center d-none">Id</th>
          <th class="text-center">PRODUCT NAME</th>
          <th class="text-center">UNIT</th>
          <th class="text-center">QUANTITY</th>
          <th class="text-center">PRICE</th>
          <th class="text-center">ACTION</th>
        </tr>
        <?php foreach ($product as $product_list) : ?>
          <tr>
            <td class="d-none"><?= esc($product_list['id']) ?></td>
            <td><?= esc($product_list['product_name']) ?></td>
            <td><?= esc($product_list['unit']) ?></td>
            <td><?= esc($product_list['quantity']) ?></td>
            <td><?= esc($product_list['price']) ?></td>
            <td class="text-center">
              <button type="button" class="btn btn-success btn-update-product" data-bs-toggle="modal" data-bs-target="#updateProductModal">Update</button>
              <button type="button" class="btn btn-danger btn-delete-product" data-bs-toggle="modal" data-bs-target="#deleteProductModal">Delete</button>
            </td>
          </tr>
        <?php endforeach ?>
      </table>

      <?= $pager->links() ?>
    </div>
  </div>


  <!-- ADD -->
  <div class="container">
    <div class="modal fade" id="myProductModal"   tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title " id="myProductModal">ADD NEW PRODUCT</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/addproduct') ?>" method="post">
              <div class="form-group p-3">
               <label for="formControlInput" class="form-label">Product Name</label>
               <input type="text" class="form-control" name="product_name" placeholder="Enter Your Product" autocomplete="off">

                <label for="formControlInput" class="form-label">Product Unit</label>
                <select class="form-select" aria-label="Default select" name="unit">
                  <option value="pcs">pcs</option>
                  <option value="bundle">bundle</option>
                </select>
                <label for=" formControlInput" class="form-label">Product Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="">
                <label for=" formControlInput" class="form-label">Product Price</label>
                <input type="number" class="form-control" name="price" placeholder="">
              </div>
              <div class=" modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add Product</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Update -->
  <div class="container">
    <div class="modal fade" id="updateProductModal"   tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateProductModal">UPDATE PRODUCT</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancel"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/update_product') ?>" method="post">
              <div class="form-group p-3">
                <div class="form-group d-none">
                  <label for="id ">ID:</label>
                  <input type="hidden" class="productId" name="id">
                </div>
                <label for="formControlInput" class="form-label">Product Name</label>
                <input type="text" class="form-control productName" name="product_name" placeholder="Enter Your Product">
                <label for="formControlInput" class="form-label">Product Unit</label>
                <select class="form-select unit" aria-label="Default select" name="unit">
                  <option value="pcs">pcs</option>
                  <option value="bundle">bundle</option>
                </select>
                <label for=" formControlInput" class="form-label">Product Quantity</label>
                <input type="number" class="form-control quantity" name="quantity" placeholder="">
                <label for=" formControlInput" class="form-label">Product Price</label>
                <input type="number" class="form-control price" name="price" placeholder="">
              </div>
              <div class=" modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update Product</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- DELETE -->
  <div class="container">
    <div class="modal fade" id="deleteProductModal"   tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteProductModal">Delete Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancel"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/delete_product') ?>" method="post">
              <div class="form-group p-3">
                <div class="form-group d-none">
                  <label for="id ">ID:</label>
                  <input type="hidden" class="delProductId" name="id">
                </div>
                              <p>Are you sure you want to delete this product? <strong class="text-danger"><span class="delProductName"></span></strong></p>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Delete Product</button>
              </div>

                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
  $(document).ready(function() {
    $("#ProductTB").on('click', '.btn-update-product', function() {
      let currentRow = $(this).closest("tr");
      let productId = currentRow.find("td:eq(0)").text();
      let productName = currentRow.find("td:eq(1)").text();
      let unit = currentRow.find("td:eq(2)").text();
      let quantity = currentRow.find("td:eq(3)").text();
      let price = currentRow.find("td:eq(4)").text();

      $("#updateProductModal .productId").val(productId);
      $("#updateProductModal .productName").val(productName);
      $("#updateProductModal .unit").val(unit);
      $("#updateProductModal .quantity").val(quantity);
      $("#updateProductModal .price").val(price);
    });

    $("#ProductTB").on('click', '.btn-delete-product', function() {
      let currentRow = $(this).closest("tr");
      let productId = currentRow.find("td:eq(0)").text();
      let productName = currentRow.find("td:eq(1)").text();

      $("#deleteProductModal .delProductId").val(productId);
      $("#deleteProductModal .delProductName").text(productName);
    });
  });
</script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</html>