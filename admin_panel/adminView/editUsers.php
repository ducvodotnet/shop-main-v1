<div class="container p-5">

  <h4>Edit Users Detail</h4>
  <?php
  include_once "../config/dbconnect.php";
  $ID = $_POST['record'];
  $qry = mysqli_query($conn, "SELECT * FROM users WHERE id='$ID'");
  $numberOfRow = mysqli_num_rows($qry);
  if ($numberOfRow > 0) {
    while ($row1 = mysqli_fetch_array($qry)) {

  ?>
          <form  enctype='multipart/form-data' action="./controller/updateUsers.php" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" name="u_id" value="<?= $row1['id'] ?>" hidden>
        </div>
        <div class="form-group">
          <label for="name">Email:</label>
          <input type="text" class="form-control" name="u_email" value="<?= $row1['email'] ?>">
        </div>
        <div class="form-group">
          <label for="desc">Password:</label>
          <input type="password" class="form-control" name="u_password" value="<?= $row1['password'] ?>">
        </div>
        <div class="form-group">
          <button type="submit" style="height:40px" class="btn btn-primary">Update Users</button>
        </div>
    <?php
    }
  }
    ?>
      </form>

</div>