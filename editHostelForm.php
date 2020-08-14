<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("head.php");
?>
<body>
  <div class="container-fluid">
    <div class="row content">
      <?php
      include("sideNav.php");
      ?>
      <div class="col-sm-10">
        <div class="row" style="background-color: #C0D9D9; height: 70px">
          <div class="col-sm-10">
            <div class="modal-body">
              <span style="font-size: 25px">&lt;<<&gt;UPDATE HOSTEL INFORMATIONS &lt;>>&gt;</span>
            </div>
          </div>
          <div class="col-sm-2">
            <div style="margin: 15px -30px 0px 0px;">Profile</div>
          </div>
        </div> 
        <hr>
      </div> 
      <!-- PHP BLOCK  -->
      <?php 
      include("connection.php");
      if (isset($_GET['id'])){
        $id = $_GET['id'];
      $query = "SELECT * FROM hostel WHERE host_id='$id'";
      $stmt = $db->query($query);
      $r = $stmt->fetch(PDO::FETCH_ASSOC);
      ?>
       <!-- END PHPH BLOCK -->
       <div class="container table-responsive"> 
        <form method="POST" action="editHostelHendler.php" role="form" style="margin-top: 50px;">
          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Hostel Id:</label>
                <input type="text" name="host_id" readonly="" value="<?php echo $r['host_id'];?>" class="form-control" id="pwd">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Hostel Name:</label>
                <input type="text" name="host_name" value="<?php echo $r['host_name'];?>" class="form-control" id="pwd">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Location:</label>
                <input type="text" name="location" value="<?php echo $r['location'];?>" class="form-control" id="pwd">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Phone Number:</label>
                <input type="text" name="phone" value="<?php echo $r['phone'];?>" class="form-control" id="pwd">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Email:</label>
                <input type="text" name="email" value="<?php echo $r['email'];?>" class="form-control" id="pwd">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Sponsered by:</label>
                <input type="text" name="sponser" value="<?php echo $r['sponser'];?>" class="form-control" id="pwd">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-10">
              <input class="btn btn-primary" type="submit" name="update" value="UPDATE">
            </div>
          </div>
        </form>    
      </div>
    </div>
  </div>
</div>
<?php
}
include("footer.php");
?>
</body>
</html>