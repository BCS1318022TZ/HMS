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
        <h4>
          <h3 style="color: blue;text-transform: uppercase;">
            LIST OF HOSTEL - <?php echo $_SESSION["status"]; ?>
          </h3>
        </h4>
        <hr>
        <h3 align="center" style="margin: 25px">MAKE ORDER FROM HOSTELS AND ROOMS NOW..!</h3> 
        <div class="container table-responsive">
          <!-- PHP BLOCK  -->
          <?php
          if (!isset($_SESSION["user"])) {
            header("location:index.php");
          }else{
              $id = $_GET['id'];
              include("connection.php");
              $query="SELECT host_name, phone, email, location, room_id, room_name, capacity, status,  hostel.host_id, room.host_id from Hostel, Room WHERE Hostel.host_id=Room.host_id AND room.room_name!='null' AND room_id='$id' order by room_name";
              $stmt = $db->query($query);
              $r = $stmt->fetch(PDO::FETCH_ASSOC);
              ?>
            <!-- END PHPH BLOCK -->
            <div class="container table-responsive"> 
              <form method="POST" action="applyHostelFormHandler.php" role="form" style="margin-top: 50px;">
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
                      <input type="text" name="room_name" readonly="" value="<?php echo $r['room_name'];?>" class="form-control" id="pwd">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label for="pwd">Room Capacity:</label>
                      <input type="text" name="capacity" readonly="" value="<?php echo $r['capacity'];?>" class="form-control" id="pwd">
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label for="pwd">Room Status:</label>
                      <input type="text" name="status" readonly="" value="<?php echo $r['status'];?>" class="form-control" id="pwd">
                    </div>
                  </div>
                </div>

                 <div class="row">
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label for="pwd">Phone Number:</label>
                      <input type="text" name="phone" readonly="" value="<?php echo $r['phone'];?>" class="form-control" id="pwd">
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label for="pwd">Hostel email:</label>
                      <input type="text" name="email" readonly="" value="<?php echo $r['email'];?>" class="form-control" id="pwd">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-5">
                    <div class="form-group">
                        <label for="pwd">Hostel Location:</label>
                        <input type="text" name="capacity" readonly="" value="<?php echo $r['location']; ?>" class="form-control" id="pwd">
                      </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="form-group">
                        <label for="pwd">Hostel Name:</label>
                        <input type="text" name="capacity" readonly="" value="<?php echo $r['host_name']; ?>" class="form-control" id="pwd">
                      </div>
                    </div>
                  </div>
                  <?php 
                  } 
              ?>
              <div class="row">
                <div class="col-sm-10">
                  <input class="btn btn-primary" type="submit" name="order" value="ORDER ROOM" style="margin: 10px">
                </div>
              </div>
            </form>    
          </div>
          <!-- END -->
        </div> 
      </div>
    </div>
  </div>
</div>
<?php
include("footer.php");
?>
</body>
</html>