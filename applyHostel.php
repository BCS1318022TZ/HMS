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
        <h3 align="center" style="margin: 25px">HOSTELS AND ROOMS AVAILABLE</h3> 
        <div class="container table-responsive">
          <!-- session -->
                <?php if(isset($_SESSION['success'])){?>
                  <label style="color: green; font-size: 20px;">
                    <?php echo $_SESSION['success']; ?>
                    
                  </label>
                <?php }?>

                <?php if(isset($_SESSION['fail'])){?>
                  <label style="color: red;font-size: 20px;"><?php echo $_SESSION['fail']; ?></label> 
                <?php }?>
                <!-- end session -->
        <table class="table table-hover" style="width: 100%;">
          <thead>
            <tr>
              <th>Hostel Name</th>
              <th>Phone Number</th>
              <th>Hostel Email</th>
              <th>Hostel Location</th>
              <th>Room Name</th>
              <th>Capacity</th>
              <th>Status</th>
              <th>Apply</th>
            </tr>
          </thead>
          <!-------------------  HOSTEL PHP BLOCK ------------------------------>

          <?php
          if (!isset($_SESSION["user"])) {
            header("location:index.php");
          }else{
              include("connection.php");
              $query="SELECT host_name, phone, email, location, room_id, room_name, capacity, status,  hostel.host_id, room.host_id from Hostel, Room WHERE Hostel.host_id=Room.host_id AND room.room_name!='null' order by room_name";
              $stmt = $db->query($query);
              while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <!-------------------END HOSTEL PHP BLOCK ------------------------------>
                <tbody>
                  <tr>
                    <td><?php echo $r["host_name"];?></td>
                    <td><?php echo "+255-". $r["phone"];?></td>
                    <td><?php echo $r["email"];?></td>
                    <td><?php echo $r["location"];?></td>
                    <td><?php echo $r["room_name"];?></td>
                    <td><?php echo $r["capacity"];?></td>
                    <td><?php echo $r["status"];?></td>
                    <td>
                      <i>
                        <a href="applyHostelForm.php?id=<?php echo $r['room_id'];?>">apply</a>
                      </i>
                    </td>
                  </tr>
                </tbody>
                <?php
              }
            }
          ?>
        </table>
      </div>
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