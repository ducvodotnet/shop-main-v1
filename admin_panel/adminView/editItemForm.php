<div class="container p-5">

  <h4>Edit Product Detail</h4>
  <?php
  include_once "../config/dbconnect.php";
  $ID = $_POST['record'];
  $qry = mysqli_query($conn, "SELECT * FROM products WHERE id='$ID'");
  $numberOfRow = mysqli_num_rows($qry);
  if ($numberOfRow > 0) {
    while ($row1 = mysqli_fetch_array($qry)) {
      $catID = $row1["category_id"];
  ?>
          <form  enctype='multipart/form-data' action="./controller/updateItemController.php" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" name="product_id" value="<?= $row1['id'] ?>" hidden>
        </div>
        <div class="form-group">
          <label for="name">Product Name:</label>
          <input type="text" class="form-control" name="p_name" value="<?= $row1['name'] ?>">
        </div>
        <div class="form-group">
          <label for="desc">Product Description:</label>
          <input type="text" class="form-control" name="p_description" value="<?= $row1['description'] ?>">
        </div>
        <div class="form-group">
          <label for="desc">Productscol:</label>
          <input type="text" class="form-control" name="p_productscol" value="<?= $row1['productscol'] ?>">
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="number" class="form-control" name="p_price" value="<?= $row1['price'] ?>">
        </div>
        <div class="form-group">
          <label for="price">Quantity:</label>
          <input type="number" class="form-control" name="p_quantity" value="<?= $row1['quantity'] ?>">
        </div>
        <div class="form-group">
          <label>Category:</label>
          <select name="category">
            <?php
            $sql = "SELECT * from categories WHERE id='$catID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
              }
            }
            ?>
            <?php
            $sql = "SELECT * from categories WHERE id!='$catID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
              }
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <img width='200px' height='150px' src='<?= $row1["image"] ?>'>
        </div>
        <div class="form-group">
          <button type="submit" style="height:40px" class="btn btn-primary">Update Item</button>
        </div>
    <?php
    }
  }
    ?>
      </form>

</div>