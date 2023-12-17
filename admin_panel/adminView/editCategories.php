<div class="container p-5">

  <h4>Edit Categories Detail</h4>
  <?php
  include_once "../config/dbconnect.php";
  $ID = $_POST['record'];
  $qry = mysqli_query($conn, "SELECT * FROM categories WHERE id='$ID'");
  $numberOfRow = mysqli_num_rows($qry);
  if ($numberOfRow > 0) {
    while ($row1 = mysqli_fetch_array($qry)) {
  ?>
          <form  enctype='multipart/form-data' action="./controller/updateCategory.php" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" name="c_id" value="<?= $row1['id'] ?>" hidden>
        </div>
        <div class="form-group">
          <label for="name">Product Name:</label>
          <input type="text" class="form-control" name="c_name" value="<?= $row1['name'] ?>">
        </div>
        <div class="form-group">
          <label for="desc">Product Description:</label>
          <input type="text" class="form-control" name="c_description" value="<?= $row1['description'] ?>">
        </div>
        <div class="form-group">
          <img width='200px' height='150px' src='<?= $row1["image"] ?>'>
        </div>
        <div class="form-group">
          <button type="submit" style="height:40px" class="btn btn-primary">Update Categories</button>
        </div>
    <?php
    }
  }
    ?>
      </form>

</div>