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
              <span style="font-size: 25px">&lt;<<&gt;UPDATE ROOM INFORMATIONS &lt;>>&gt;</span>
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
        $query = "SELECT * FROM room WHERE room_id='$id'";
        $stmt = $db->query($query);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <!-- END PHPH BLOCK -->
        <div class="container table-responsive"> 
          <form method="POST" action="editRoomHendler.php" role="form" style="margin-top: 50px;">
            <div class="row">
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="pwd">Room Id:</label>
                  <input type="text" name="room_id" readonly="" value="<?php echo $r['room_id'];?>" class="form-control" id="pwd">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="pwd">Room Name:</label>
                  <input type="text" name="room_name" value="<?php echo $r['room_name'];?>" class="form-control" id="pwd">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="pwd">Room Capacity:</label>
                  <input type="text" name="capacity" value="<?php echo $r['capacity'];?>" class="form-control" id="pwd">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="pwd">Room Status:</label>
                  <input type="text" name="status" value="<?php echo $r['status'];?>" class="form-control" id="pwd">
                </div>
              </div>
            </div>
            <?php
            $hostId = $r["host_id"];
            $q="SELECT * FROM hostel WHERE host_id='$hostId'";
            $stmts = $db->query($q);
            $row = $stmts->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="row">
              <div class="col-sm-5">
                <select name="host_name" class="form-control"> <!--host_id-->
                  <?php 
                  include("connection.php");
                  $query="Select * from Hostel";
                  $stmt = $db->query($query);
                  while($rw = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $rw['host_name']; ?>">
                    <?php echo $rw['host_name']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-10">
              <input class="btn btn-primary" type="submit" name="update" value="UPDATE">
            </div>
          </div>
        </form>    
      </div>
      <!-- END -->
    </div>
  </div>
</div>
<?php
}
include("footer.php");
?>
</body>
</html>